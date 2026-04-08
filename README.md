# 🚀 LearnVentoryHub
> **A Comprehensive Inventory and Point-of-Sale (POS) System tailored for School Cooperatives.**
> ระบบจัดการคลังสินค้าและจุดขาย (POS) สำหรับสหกรณ์ร้านค้าในโรงเรียน

---

## 📸 System Preview
<p align="center">
  <img src="https://github.com/user-attachments/assets/f34c0061-f0bf-436a-b1a1-1c7448543d2c" width="700" style="border-radius: 8px; box-shadow: 0px 4px 10px rgba(0,0,0,0.1);">
</p>

---

## ✨ Key Features
* 🔐 **Secure Authentication:** Robust user registration and login protocols.
* 👥 **Role-Based Access Control (RBAC):** Dedicated workspaces and permissions strictly separated for **Admins** and **Staff**.
* 📦 **Smart Inventory Management:** Seamless CRUD operations to effortlessly track products and categorize inventory.
* 💳 **Streamlined POS System:** An intuitive and user-friendly interface for processing sales and handling transactions efficiently.
* 📊 **Analytics & Reporting:** Generate detailed transaction histories and comprehensive sales reports for better business insights.

---

## 🛠️ Tech Stack
* **Frontend:** HTML5, CSS3, Vanilla JavaScript
* **Backend:** PHP (Core)
* **Database:** MySQL

---

## 📁 Architecture & Structure
```text
LearnVentoryHub/
├── README.md
├── db.php                     # Database connection configuration
├── index.php                  # Main dashboard/entry point
├── login.php / logout.php     # Authentication handlers
├── register.php               # New user onboarding
├── manage_products.php        # Inventory CRUD (Products)
├── edit_product.php           # Product modification logic
├── manage_categories.php      # Inventory CRUD (Categories)
├── sell.php                   # POS Interface
├── process_payment.php        # Transaction processing logic
├── sales_report.php           # Analytics & Reporting
└── pos_store.sql              # Database schema & initial data
