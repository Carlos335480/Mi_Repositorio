const express = require("express");
const axios = require("axios");
const cors = require("cors"); // Añadir CORS
const app = express();
const PORT = 8081; // Cambiar el puerto a 8081

// Habilitar CORS
app.use(cors());

// Endpoint para obtener lugares cercanos
app.get("/places", async (req, res) => {
    const { lat, lng } = req.query;
    const API_KEY = "AIzaSyBCZQgSJSU7VNYy2vErunSfQG-YYMduIKo";
    try {
        const response = await axios.get(
            `https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=${lat},${lng}&radius=1500&type=restaurant|tourist_attraction|park|museum|art_gallery|stadium|zoo|aquarium|pharmacy|hospital|supermarket|store|shopping_mall|market|hotel|car_repair&key=${API_KEY}`
        );
        // Asegúrate de que los resultados sean enviados como un arreglo
        res.json(response.data.results);
    } catch (error) {
        console.error(error);
        res.status(500).send("Error retrieving places");
    }
});

// Iniciar el servidor
app.listen(PORT, () => {
    console.log(`Server running on http://192.168.0.16:${PORT}`);
});

