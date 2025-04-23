# 📋 Laravel Task Management Application

This is a simple and beginner-friendly **Task Management System** built with Laravel. It allows users to manage tasks, log timesheets, visualize reports, view tasks on a calendar, and export data to Excel.

---

## 🚀 Features

### ✅ Task Management
- Add, update, and delete tasks.
- Track task status: **Pending**, **In Progress**, **Completed**.
- Pagination support for task lists.

### 🕒 Timesheet Logging
- Log work hours against tasks.
- Add comments and view timesheet entries.

### 📅 Calendar Integration
- View tasks directly on a calendar.
- Tasks are color-coded based on priority:
  - **Urgent**: Red
  - **Important**: Yellow
  - **Normal**: Gray.
- Click on a task to edit it.
- Click on a date to create a new task for that date.

### 📊 Interactive Reporting
- **Pie Chart**: Task status distribution.
- **Doughnut Chart**: Task priority distribution.
- **Bar Chart**: Hours logged per task.
- **Line Chart**: Daily work log.

### 📈 Dashboard Overview
- Summary of total tasks, total hours worked, and pending tasks.
- **Task Status Distribution Chart**: Visualize the proportion of tasks by their status.
- **Task Priority Distribution Chart**: Analyze tasks based on their priority levels.

### 📥 Export Options
- Export timesheets to Excel using **Laravel Excel**.

### 💡 Clean UI
- Built with **Bootstrap 5** for a responsive and modern design.

---

## 🛠️ Tech Stack

| Layer       | Technology                |
|-------------|---------------------------|
| **Backend** | Laravel 10                |
| **Frontend**| Blade + Bootstrap 5       |
| **Charts**  | Chart.js                  |
| **Calendar**| FullCalendar.js           |
| **Export**  | Maatwebsite Laravel Excel |
| **Database**| MySQL                     |

---

## 📦 Installation

1. Clone the repository:
   ```sh
   git clone https://github.com/your-repo/taskit.git
   cd taskit
