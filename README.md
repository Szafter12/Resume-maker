# Resume Maker

The "Resume Maker" project allows users to create simple CVs in PDF format via a form. Users enter their data in the form, and a PDF file with the user's information is generated upon submission.

## Features

- A form to fill in personal details, work experience, etc.
- PDF file generation based on the filled-out form.

## How to Run the Project

1. Clone the repository:
    ```bash
    git clone https://github.com/Szafter12/Resume-maker.git
    ```

2. Navigate to the project directory:
    ```bash
    cd Resume-maker
    ```

3. Start the built-in PHP server:
    ```bash
    php -S localhost:8000
    ```
    Alternatively, if you're using XAMPP, place the project in the `htdocs` folder and start the Apache server.

4. Open your browser and navigate to:
    ```
    http://localhost:8000
    ```

## Technologies

- PHP
- TCPDF (for PDF generation)

## Notes

- The design of the generated PDF is not perfect, as the TCPDF library has limited customization options. If you're looking for better design, you might want to explore other solutions or more advanced libraries.
- This project is mainly for learning purposes and practicing object-oriented programming in PHP. The focus was on code structure.
