# 🚀 Role API (Laravel 13)

A production-style REST API built with Laravel for managing users, roles, and authentication using pivot tables and Swagger documentation.

---

## 📌 Project Overview

This project demonstrates a **Role-Based Access Control (RBAC)** system where:

- Users can have multiple roles
- Roles can be assigned to multiple users
- Authentication is handled using Laravel Sanctum
- API documentation is generated using Swagger (L5-Swagger)

---

## 🧠 Core Concept

### Many-to-Many Relationship

This project uses a pivot table:

Each user can have multiple roles and each role can belong to multiple users.

---

## ⚙️ Tech Stack

- Laravel 13
- PHP 8.2+
- MySQL
- Laravel Sanctum (API Authentication)
- L5-Swagger (API Documentation)
- Swagger-PHP (OpenAPI annotations)

---

## 📂 Database Structure

### users table
- id
- name
- email
- password

### roles table
- id
- name

### role_user (pivot table)
- user_id
- role_id

---

## 📦 Installation Guide

### 1. Clone the project
```bash
git clone <your-repo-url>
cd role-api
