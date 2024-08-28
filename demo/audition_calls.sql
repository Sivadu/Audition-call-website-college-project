CREATE TABLE audition_calls (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producer_name VARCHAR(255) NOT NULL,
    project_title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    audition_date DATE NOT NULL,
    audition_location VARCHAR(255) NOT NULL,
    contact_email VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    image_tmp VARCHAR(255)NOT NULL
);