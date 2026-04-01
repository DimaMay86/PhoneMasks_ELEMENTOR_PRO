# jQuery Phone Mask for Elementor Forms

[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)
[![jQuery](https://img.shields.io/badge/jQuery-3.x-green.svg)](https://jquery.com/)
[![Elementor](https://img.shields.io/badge/Elementor-Pro-red.svg)](https://elementor.com/)

Автоматическая маска ввода для поля телефона в формате **+7 (___) ___-__-__**. Идеально подходит для сайтов на WordPress с Elementor Pro.

---

## 📋 Описание | Description

**Русский:**  
Скрипт автоматически применяет маску ввода для полей телефона. Работает с динамически добавляемыми элементами, всплывающими окнами Elementor Popup и формами Elementor Pro. После отправки формы поля автоматически очищаются и маска сбрасывается.

**English:**  
The script automatically applies an input mask for phone fields. Works with dynamically added elements, Elementor Popup windows, and Elementor Pro forms. After form submission, fields are automatically cleared and the mask is reset.

**Mask format:** `+7 (___) ___-__-__`

---

## 🚀 Особенности | Features

| Feature | Описание |
|---------|---------|
| 🎯 **Automatic detection** | Автоматическое определение полей по ID или name |
| 🔄 **Dynamic content** | Поддержка динамически добавляемых полей (MutationObserver) |
| 🪟 **Popup support** | Работает с Elementor Popup |
| ✨ **Auto-clear** | Автоматическая очистка полей после отправки формы |
| 🎨 **User-friendly** | При фокусе — очистка плейсхолдера, при потере фокуса — возврат |
| ⚡ **Lightweight** | Легковесный, использует jQuery Mask Plugin |

---

## 📦 Установка | Installation

### 1. Подключите зависимости | Include dependencies

```html
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
