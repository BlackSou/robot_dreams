<?php
$servername = "localhost";
$username = "my_user";
$password = "my_password";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    return "Connection error: " . $conn->connect_error;
}

$sql_create_database = "CREATE DATABASE IF NOT EXISTS test_db";

if ($conn->query($sql_create_database) === TRUE) {

    $conn->select_db("test_db");

    $sql_faculties = "CREATE TABLE faculties (
        faculty_id INT PRIMARY KEY,
        faculty_name VARCHAR(255)
    )";

    $sql_subjects = "CREATE TABLE subjects (
        subject_id INT PRIMARY KEY,
        subject_name VARCHAR(255)
    )";

    $sql_students = "CREATE TABLE students (
        student_id INT PRIMARY KEY,
        student_name VARCHAR(255),
        faculty_id INT,
        FOREIGN KEY (faculty_id) REFERENCES faculties(faculty_id)
    )";

    $sql_student_grades = "CREATE TABLE student_grades (
        grade_id INT PRIMARY KEY,
        student_id INT,
        subject_id INT,
        grade INT,
        FOREIGN KEY (student_id) REFERENCES students(student_id),
        FOREIGN KEY (subject_id) REFERENCES subjects(subject_id)
    )";

    if ($conn->query($sql_faculties) === TRUE &&
        $conn->query($sql_subjects) === TRUE &&
        $conn->query($sql_students) === TRUE &&
        $conn->query($sql_student_grades) === TRUE) {

        $conn->query("INSERT INTO faculties (faculty_id, faculty_name) VALUES (1, 'Faculty 1')");
        $conn->query("INSERT INTO faculties (faculty_id, faculty_name) VALUES (2, 'Faculty 2')");

        $conn->query("INSERT INTO subjects (subject_id, subject_name) VALUES (1, 'Subject 1')");
        $conn->query("INSERT INTO subjects (subject_id, subject_name) VALUES (2, 'Subject 2')");
        $conn->query("INSERT INTO subjects (subject_id, subject_name) VALUES (3, 'Subject 3')");

        $conn->query("INSERT INTO students (student_id, student_name, faculty_id) VALUES (1, 'Student 1', 1)");
        $conn->query("INSERT INTO students (student_id, student_name, faculty_id) VALUES (2, 'Student 2', 2)");

        $conn->query("INSERT INTO student_grades (grade_id, student_id, subject_id, grade) VALUES (1, 1, 1, 95)");
        $conn->query("INSERT INTO student_grades (grade_id, student_id, subject_id, grade) VALUES (2, 1, 2, 85)");
        $conn->query("INSERT INTO student_grades (grade_id, student_id, subject_id, grade) VALUES (3, 2, 1, 90)");

        echo "<br>Data added successfully";
    } else {
        echo "Error creating tables: " . $conn->error;
    }
} else {
    echo "An error occurred while creating the database: " . $conn->error;
}

$conn->close();
