````md
# 🌾 AgroSense — AI Powered Smart Agriculture Management System

## 📌 Overview

AgroSense is an AI-powered smart agriculture platform designed to help farmers manage farms, monitor crop health, detect diseases, analyze growth progress, and receive intelligent farming recommendations.

The system combines:
- 🌦️ Weather Monitoring
- 🤖 AI Crop Analysis
- 📷 Disease Detection using Images
- 📊 Farm Analytics
- 🌱 Crop Progress Tracking
- 🧠 Gemini AI Farming Assistant

AgroSense aims to make modern farming more intelligent, data-driven, and farmer-friendly.

---

# 🚀 Features

## 👨‍🌾 Farmer Dashboard
- Smart analytics dashboard
- Farm overview
- Crop health insights
- Weather monitoring
- AI recommendations

---

## 🏡 Farm Management
Farmers can:
- Add farms
- Edit farms
- Delete farms
- Track farm location
- Store total farm area

---

## 🌱 Field Management
Each farm can contain multiple fields.

Features:
- Add field
- Crop type selection
- Soil type
- Irrigation status
- Field size tracking
- Sowing date management

---

## 📈 Crop Progress Tracking
Track crop growth with:
- Growth stage detection
- Health percentage
- Progress percentage
- Predicted yield
- Crop age calculation

---

## 🤖 AI Crop Disease Detection
Farmers can upload crop images.

The AI system analyzes:
- Crop condition
- Possible diseases
- Risk level
- AI health score
- Farming recommendations

---

## 🌦️ Live Weather Monitoring
Integrated weather API provides:
- Temperature
- Humidity
- Weather condition
- Live location-based weather

---

## 🧠 AI Farming Assistant
Farmers can search crops using local names like:
- gehu
- dhaan
- alu
- tamatar

The AI responds in:
✅ Hindi  
✅ Farmer-friendly language  
✅ Detailed farming guidance

Including:
- Best farming season
- Irrigation
- Fertilizers
- Disease prevention
- Yield improvement

---

# 🛠️ Tech Stack

## Frontend
- HTML5
- Tailwind CSS
- Blade Templates
- JavaScript

## Backend
- Laravel 13
- PHP 8.4

## Database
- MySQL

## APIs & AI
- OpenWeather API
- Gemini AI API

---

# 🧩 System Modules

## 1. Authentication Module
- Login
- Registration
- Role-based authentication

---

## 2. Farmer Module
- Dashboard
- Farm management
- AI crop assistant
- Weather tracking

---

## 3. Farm Module
- Farm CRUD operations
- Location tracking

---

## 4. Field Module
- Field CRUD operations
- Crop tracking

---

## 5. Crop Progress Module
- Growth monitoring
- AI disease analysis
- Image uploads

---

# 🤖 AI Features

## AI Crop Health Analysis
Uses AI to:
- Detect crop diseases
- Estimate crop health
- Predict risks
- Suggest improvements

---

## AI Farming Assistant
Natural language farming guidance in Hindi.

Example:

Input:
gehu

Output:
गेहूं की खेती के लिए दोमट मिट्टी सबसे उपयुक्त होती है...

---

# 📸 Screenshots

## Dashboard
- Weather analytics
- Crop analytics
- AI insights

## Disease Detection
- Image upload
- AI health report

## AI Farming Assistant
- Hindi crop guidance

---

# ⚙️ Installation

## 1. Clone Repository

```bash
git clone https://github.com/yourusername/agrosense.git
````

---

## 2. Go to Project Folder

```bash
cd agrosense
```

---

## 3. Install Dependencies

```bash
composer install
npm install
```

---

## 4. Configure Environment

Copy `.env.example`

```bash
cp .env.example .env
```

---

## 5. Generate App Key

```bash
php artisan key:generate
```

---

## 6. Configure Database

Inside `.env`

```env
DB_DATABASE=agrosense
DB_USERNAME=root
DB_PASSWORD=
```

---

## 7. Configure APIs

```env
OPENWEATHER_API_KEY=your_key
GEMINI_API_KEY=your_key
```

---

## 8. Run Migrations

```bash
php artisan migrate
```

---

## 9. Create Storage Link

```bash
php artisan storage:link
```

---

## 🔟 Run Development Server

```bash
php artisan serve
```

---

# 📂 Project Structure

```txt
app/
 ├── Http/
 │   ├── Controllers/
 │   ├── Middleware/
 │
 ├── Models/
 │
 ├── Services/

resources/
 ├── views/
 │   ├── farmer/
 │   ├── farms/
 │   ├── fields/
 │   ├── crop-progress/

routes/
 ├── web.php
```

---

# 🔐 Roles

| Role   | Access                 |
| ------ | ---------------------- |
| Admin  | Full access            |
| Farmer | Farm & crop management |
| Expert | Monitoring & analytics |

---

# 📊 Future Improvements

* 🎙️ Voice Assistant
* 🛰️ Satellite Crop Monitoring
* 💧 Smart Irrigation System
* 📱 Mobile App
* 🌍 Multi-language Support
* 🤖 AI Chatbot
* 📦 Marketplace Integration

---

# 🎯 Project Goal

The goal of AgroSense is to empower farmers with:

* AI technology
* Smart analytics
* Real-time monitoring
* Easy farming guidance

to improve:
✅ productivity
✅ crop quality
✅ decision-making
✅ sustainable agriculture

---

# 👨‍💻 Developed By

Sourodip Dey

---

# 📜 License

This project is developed for educational and research purposes.

```
```
