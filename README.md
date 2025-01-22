# Alumni Management System
The Alumni Management System project in PHP is an advanced initiative designed to help university management efficiently manage alumni records. The aim of this project is to create an online dashboard for the Alumni Management System. It facilitates the management of both recent and former graduates, allowing for the effective registration, searching, and organization of alumni information.

The project was developed using PHP and MySQL. 

## Pages and Modules
- Home page
- About us page
- Vision & mission page
- President's message page
- Executive committee page
- Downloads page
- Join with us page
- Benefits page
- Register online page
- Projects page
- Events page
- Contact us page
- Login module
- Admin module
- Alumni module

## Tech Stack
- **Frontend:** HTML, CSS, JavaScript, Bootstrap
- **Backend:** PHP, MySQL
- **Server:** Apache (XAMPP / LAMP / WAMP)
- **Version Control:** Git

## Setup and Installation

### Prerequisites
Ensure the following tools are installed on your system:
- XAMPP / WAMP / LAMP or any PHP and MySQL environment
- Git
- Browser (Chrome, Mozilla)

### Installation Steps
1. **Clone the Repository:**
   ```bash
   git clone https://github.com/buddhirangana/alumni-management-system.git
   ```

2. **Setup the Database:**
   - Import the `aasict_db.sql` file located in the `db` folder into your MySQL server.
   - Create a database named `aasict_db` and import the tables and data.

3. **Configure the Environment:**
   - Open the `config.php` file (or equivalent configuration file).
   - Update the database credentials:
     ```php
     $server = "localhost";
     $username = "root";
     $password = "";
     $database = "aasict_db";
     ```

4. **Start the Server:**
   - If using XAMPP, start Apache and MySQL.
   - Place the project folder in the `htdocs` directory.

5. **Access the Application:**
   - Open your browser and navigate to `http://localhost/alumni-management-system/`.

## Contributing
We welcome contributions! To contribute:
1. Fork the repository.
2. Create a new branch (`git checkout -b feature/your-feature`).
3. Commit your changes (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature/your-feature`).
5. Open a pull request.

## Credits
- Special thanks goes to [AdminLTE](https://adminlte.io/)

## Contact
For queries or feedback, please contact:
- **Link in Bio:** https://bento.me/buddhirangana
- **GitHub:** [Buddhi Rangana](https://github.com/buddhirangana)

## License
Distributed under the MIT License. See `LICENSE` for more information.



