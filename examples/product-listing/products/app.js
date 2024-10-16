const express = require('express');
const app = express();

app.get('/', (req, res) => res.json({ fruits: ["Coconut", "Nut", "Guava", "Apple"] }));

app.listen(80, () => {
    console.log('Product service started at port 80');
});
