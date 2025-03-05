import React, { useState, useEffect } from "react";
import { View, Text, ScrollView, StyleSheet, TouchableOpacity, Alert, Image } from "react-native";
import MapView, { Marker, Polyline } from "react-native-maps";
import * as Location from "expo-location";
import AsyncStorage from '@react-native-async-storage/async-storage';

export default function App() {
    const [location, setLocation] = useState(null);
    const [places, setPlaces] = useState([]);
    const [routeCoordinates, setRouteCoordinates] = useState([]);
    const [distance, setDistance] = useState(null);
    const [routeStarted, setRouteStarted] = useState(false);
    const [tracking, setTracking] = useState(null);
    const [buttonText, setButtonText] = useState("Iniciar Ruta");
    const [isRoutePanelVisible, setRoutePanelVisible] = useState(false);
    const [selectedReviews, setSelectedReviews] = useState([]); 
    const [favoriteRoutes, setFavoriteRoutes] = useState([]);

    useEffect(() => {
        (async () => {
            let { status } = await Location.requestForegroundPermissionsAsync();
            if (status !== "granted") {
                alert("Permiso de localización denegado");
                return;
            }

            let loc = await Location.getCurrentPositionAsync({});
            setLocation({
                latitude: loc.coords.latitude,
                longitude: loc.coords.longitude,
                latitudeDelta: 0.05,
                longitudeDelta: 0.05,
            });
            obtenerPuntosInteres(loc.coords);
        })();
    }, []);

    const obtenerPuntosInteres = async ({ latitude, longitude }) => {
        try {
            const API_KEY = "tu api key";
            const response = await fetch(
                `https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=${latitude},${longitude}&radius=1500&type=restaurant|tourist_attraction|park|museum&key=${API_KEY}`
            );
            const placesData = await response.json();
    
            if (placesData.results) {
                const fetchedPlaces = placesData.results.map((place) => ({
                    name: place.name,
                    vicinity: place.vicinity,
                    latitude: place.geometry.location.lat,
                    longitude: place.geometry.location.lng,
                    photoUrl: place.photos ? 
                        `https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photo_reference=${place.photos[0].photo_reference}&key=${API_KEY}` 
                        : null,
                    placeId: place.place_id,
                }));
                setPlaces(fetchedPlaces);
            } else {
                alert("No se encontraron lugares.");
            }
        } catch (error) {
            console.error("Error al obtener puntos de interés:", error);
            alert("Error al obtener puntos de interés");
        }
    };

    const verOpiniones = async (placeId) => {
        try {
            const API_KEY = "Tu api key";
            const response = await fetch(
                `https://maps.googleapis.com/maps/api/place/details/json?place_id=${placeId}&fields=reviews&language=es&key=${API_KEY}`
            );
            const data = await response.json();
    
            if (data.result && data.result.reviews) {
                const reviews = data.result.reviews.map(review => review.text);
                setSelectedReviews(reviews);
                Alert.alert("Opiniones", reviews.join("\n\n"));
            } else {
                Alert.alert("Opiniones", "No hay opiniones disponibles para este lugar.");
            }
        } catch (error) {
            console.error("Error al obtener opiniones:", error);
            alert("Error al obtener opiniones");
        }
    };

    const agregarRutaFavorita = (place) => {
        setFavoriteRoutes((prevRoutes) => {
            if (!prevRoutes.find((route) => route.placeId === place.placeId)) {
                return [...prevRoutes, place]; 
            }
            return prevRoutes;
        });
        Alert.alert("Ruta Favorita", `${place.name} ha sido añadida a tus rutas favoritas.`);
    };

    const guardarRutasFavoritas = async () => {
        try {
            await AsyncStorage.setItem('favoriteRoutes', JSON.stringify(favoriteRoutes));
            Alert.alert("Éxito", "Tus rutas favoritas han sido guardadas.");
        } catch (error) {
            console.error("Error al guardar las rutas favoritas:", error);
            Alert.alert("Error", "No se pudo guardar las rutas favoritas.");
        }
    };

    const obtenerRuta = async (destino) => {
        if (routeStarted) {
            Alert.alert("Ruta en curso", "Ya tienes una ruta iniciada. Cancela la ruta actual antes de iniciar otra.");
            return;
        }

        try {
            const API_KEY = "Tu api key"
            const response = await fetch(
                `https://maps.googleapis.com/maps/api/directions/json?origin=${location.latitude},${location.longitude}&destination=${destino.latitude},${destino.longitude}&mode=driving&key=${API_KEY}`
            );
            const data = await response.json();

            if (data.status === "OK") {
                const routePoints = decodePolyline(data.routes[0].overview_polyline.points);
                setRouteCoordinates(routePoints);
                setDistance(data.routes[0].legs[0].distance.text);
                setButtonText("Iniciar Ruta");
                setRoutePanelVisible(false);
            } else {
                console.error("Error de Directions API:", data.status);
                alert(`Error en la obtención de ruta: ${data.status}`);
            }
        } catch (error) {
            console.error("Error al obtener la ruta:", error);
            alert("Error al obtener la ruta");
        }
    };

    const decodePolyline = (encoded) => {
        let points = [];
        let index = 0, lat = 0, lng = 0;

        while (index < encoded.length) {
            let b, shift = 0, result = 0;
            do {
                b = encoded.charCodeAt(index++) - 63;
                result |= (b & 0x1f) << shift;
                shift += 5;
            } while (b >= 0x20);
            lat += (result & 1) ? ~(result >> 1) : (result >> 1);

            shift = 0;
            result = 0;
            do {
                b = encoded.charCodeAt(index++) - 63;
                result |= (b & 0x1f) << shift;
                shift += 5;
            } while (b >= 0x20);
            lng += (result & 1) ? ~(result >> 1) : (result >> 1);

            points.push({ latitude: lat / 1e5, longitude: lng / 1e5 });
        }
        return points;
    };

    const iniciarRuta = async () => {
        const subscription = await Location.watchPositionAsync(
            { accuracy: Location.Accuracy.High, timeInterval: 5000, distanceInterval: 10 },
            (newLocation) => {
                const { latitude, longitude } = newLocation.coords;
                setLocation((prevLocation) => ({
                    ...prevLocation,
                    latitude,
                    longitude,
                }));
            }
        );
        setTracking(subscription); 
        setRouteStarted(true); 
        setButtonText("Ruta Iniciada");
    };

    const cancelarRuta = () => {
        setRouteCoordinates([]);
        setDistance(null);
        setRouteStarted(false);
        setButtonText("Iniciar Ruta");

        if (tracking) {
            tracking.remove();
            setTracking(null);
        }
        setRoutePanelVisible(false); 
    };

    return (
        <View style={{ flex: 1 }}>
            <View style={styles.header}>
                <Text style={styles.headerText}>Triply</Text>
            </View>
            {location && (
                <MapView
                    style={styles.map}
                    initialRegion={location}
                    showsUserLocation
                    followUserLocation
                >
                    {places.map((place) => (
                        <Marker
                            key={place.placeId}
                            coordinate={{ latitude: place.latitude, longitude: place.longitude }}
                            title={place.name}
                            description={place.vicinity}
                            onPress={() => obtenerRuta(place)}
                                    disabled={routeStarted}
                        />
                    ))}
                    {routeCoordinates.length > 0 && (
                        <Polyline
                            coordinates={routeCoordinates}
                            strokeColor="#FF6347"
                            strokeWidth={6}
                        />
                    )}
                </MapView>
            )}

            {isRoutePanelVisible && (
                <View style={styles.routePanel}>
                    <Text style={styles.distanceText}>Distancia: {distance}</Text>
                    <Text style={styles.distanceText}>Duración: {distance}</Text>
                    
                </View>
            )}
            <TouchableOpacity
                        style={styles.startButton}
                        onPress={routeStarted ? cancelarRuta : iniciarRuta}
                    >
                        <Text style={styles.buttonText}>{buttonText}</Text>
                    </TouchableOpacity>
            <ScrollView contentContainerStyle={styles.scrollView}>
                <Text style={styles.title}>Lugares Cercanos</Text>
                {places.map((place) => (
                    <View key={place.placeId} style={styles.placeItem}>
                        <Image
                            style={styles.placeImage}
                            source={{ uri: place.photoUrl }}
                        />
                        <View style={styles.placeDetails}>
                            <Text style={styles.placeName}>{place.name}</Text>
                            <Text style={styles.placeVicinity}>{place.vicinity}</Text>
                            <TouchableOpacity
                                style={styles.favoriteButton}
                                onPress={() => agregarRutaFavorita(place)}
                            >
                                <Text style={styles.buttonText}>Añadir a Favoritos</Text>
                            </TouchableOpacity>
                            <TouchableOpacity
                                style={styles.reviewsButton}
                                onPress={() => verOpiniones(place.placeId)}
                            >
                                <Text style={styles.buttonText}>Ver Opiniones</Text>
                            </TouchableOpacity>
                            <TouchableOpacity
                                style={styles.reviewsButton}
                                onPress={() => obtenerRuta(place.placeId)}
                            >
                                <Text style={styles.buttonText}>Ver Ruta</Text>
                            </TouchableOpacity>
                        </View>
                    </View>
                ))}
                <TouchableOpacity
                    style={styles.saveFavoritesButton}
                    onPress={guardarRutasFavoritas}
                >
                    <Text style={styles.buttonText}>Guardar Rutas Favoritas</Text>
                </TouchableOpacity>
            </ScrollView>
        </View>
    );
}

const styles = StyleSheet.create({
    header: {
        backgroundColor: "#FF6347",
        padding: 15,
        alignItems: "center",
    },
    headerText: {
        fontSize: 20,
        color: "white",
    },
    map: {
        width: "100%",
        height: "50%",
    },
    routePanel: {
        position: "absolute",
        bottom: 0,
        left: 0,
        right: 0,
        backgroundColor: "white",
        padding: 10,
        elevation: 5,
    },
    distanceText: {
        fontSize: 16,
        marginVertical: 5,
    },
    startButton: {
        backgroundColor: "#FF6347",
        padding: 10,
        alignItems: "center",
        borderRadius: 5,
    },
    buttonText: {
        color: "white",
        fontSize: 16,
    },
    scrollView: {
        padding: 10,
    },
    title: {
        fontSize: 20,
        fontWeight: "bold",
        marginBottom: 10,
    },
    placeItem: {
        flexDirection: "row",
        marginBottom: 15,
    },
    placeImage: {
        width: 60,
        height: 60,
        borderRadius: 30,
    },
    placeDetails: {
        marginLeft: 10,
        flex: 1,
    },
    placeName: {
        fontSize: 18,
        fontWeight: "bold",
    },
    placeVicinity: {
        fontSize: 14,
    },
    favoriteButton: {
        backgroundColor: "#FF6347",
        padding: 5,
        marginTop: 5,
        borderRadius: 5,
        alignItems: "center",
    },
    reviewsButton: {
        backgroundColor: "#FF6347",
        padding: 5,
        marginTop: 5,
        borderRadius: 5,
        alignItems: "center",
    },
    saveFavoritesButton: {
        backgroundColor: "#FF6347",
        padding: 10,
        borderRadius: 5,
        alignItems: "center",
    }
});
