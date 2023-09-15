<!DOCTYPE html>
<html>
<head>
    <title>Contact Us - Dr Dev Clinic</title>
    <link rel="stylesheet" href="frontend/css/style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <section class="contact-section">
            <style>
                main {
                    max-width: 800px;
                    margin: 0 auto;
                    padding: 20px;
                }

                .contact-section {
                    margin-top: 50px;
                }

                .contact-section h2 {
                    font-size: 30px;
                    margin-bottom: 20px;
                }

                .contact-section p {
                    font-size: 18px;
                    margin-bottom: 30px;
                }

                form {
                    max-width: 500px;
                }

                label {
                    display: block;
                    margin-bottom: 10px;
                }

                input, textarea {
                    width: 100%;
                    padding: 10px;
                    margin-bottom: 20px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    font-size: 16px;
                }

                textarea {
                    resize: vertical;
                }

                button {
                    background-color: #007BFF;
                    color: #fff;
                    padding: 10px 20px;
                    border: none;
                    border-radius: 5px;
                    font-size: 18px;
                    cursor: pointer;
                }

                button:hover {
                    background-color: #0056b3;
                }
            </style>
            <h2>Contact Us</h2>
            <p>If you have any questions, concerns, or would like to schedule an appointment, please fill out the form below and our team will get back to you as soon as possible.</p>
            
            <form action="backend/contact_process.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>

                <?php if (isset($_GET['success']) && $_GET['success'] === '1') { ?>
                <p class="success-message">Your message has been sent successfully! We will get back to you soon.</p>
                <?php } elseif (isset($_GET['error']) && $_GET['error'] === '1') { ?>
                    <p class="error-message">Failed to send your message. Please try again later.</p>
                <?php } ?>

                <button type="submit">Submit</button>
            </form>
        </section>
    </main>

    <!-- <?php include 'footer.php'; ?> -->
</body>
</html>
