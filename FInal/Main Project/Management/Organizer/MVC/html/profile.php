<?php
session_start();

if (!isset($_SESSION['organizer_id'])) {
    header("Location: ../../../User/MVC/html/login.php");
    exit();
}

$organizerName = isset($_SESSION['organizer_name']) ? $_SESSION['organizer_name'] : 'Organizer';
?>






    <div class="a">
        <h2>Organizer Profile</h2>

        <?php include "../php/profile.php"; ?>

        <div class="profile-container">
            <?php if (!empty($message)): ?>
                <div class="message <?= strpos($message, 'successfully') !== false ? 'success' : 'error' ?>">
                    <?= htmlspecialchars($message) ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-group">
                    <label>Full Name:</label>
                    <input type="text" name="fullname" value="<?= htmlspecialchars($organizer['fullname']) ?>" required>
                </div>

                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($organizer['email']) ?>" required>
                </div>

                <div class="form-group">
                    <label>Phone:</label>
                    <input type="text" name="phone" value="<?= htmlspecialchars($organizer['phone'] ?? '') ?>" required>
                </div>

                <button type="submit" class="submit-btn">Update Profile</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
