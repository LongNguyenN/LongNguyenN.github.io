"use strict";

const express = require("express");
const multer = require("multer");

const app = express();
app.use(express.urlencoded({extended: true}));
app.use(express.json());
app.use(multer().none());

const db = mysql.createPool({
  host: process.env.DB_URL || 'localhost',
  port: process.env.DB_PORT || '3306',
  user: process.env.DB_USERNAME || 'root',
  password: process.env.DB_PASSWORD || 'root',
  database: process.env.DB_NAME || 'hw5db'
});


app.get("/information", async function(req, res) { 
});

app.use(express.static("public"));
const PORT = process.env.PORT || 8000;
app.listen(PORT);
