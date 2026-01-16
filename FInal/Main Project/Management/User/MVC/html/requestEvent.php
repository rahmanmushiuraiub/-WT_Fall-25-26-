

<DOCTYPE html>
<html>
<head>
    <title>Request Event</title>
    <link rel="stylesheet" href="../css/requestEvent.css">
</head>
<body>
    <div class="a">
        <h2>Request an Event</h2>
        <form method="POST" action="../php/requestEvent.php">
            <label for="eventName">Event Name:</label>
            <input type="text" id="eventName" name="eventName" required>

            <label for="eventDate">Event Date:</label>
            <input type="date" id="eventDate" name="eventDate" required>

            <label for="eventLocation">Event Location:</label>
            <input type="text" id="eventLocation" name="eventLocation" required>

            <label for="eventDescription">Event Description:</label>
            <textarea id="eventDescription" name="eventDescription" required></textarea>

            <input type="submit" value="Submit Request">
        </form>
    </div>
</body>
</html>
