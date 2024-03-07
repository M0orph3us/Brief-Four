<?php
session_start();
if (!isset($_SESSION["isConnectedAdmin"]) || $_SESSION["isConnectedAdmin"] !== true || empty($_SESSION["isConnectedAdmin"])) {
    header("Location: ./home.php");
    exit();
}
require '../../backend/csrf-token/csrfRegister.php';
$csrfAdminForm = csrfAdminForm();

require './includes/header.php';
?>

<main>
    <div class="form-admin-container">
        <form action="../../backend/controller/adminForm.php" method="post">
            <label for="region-select">region</label>
            <select name="region" id="region-select" required>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select>

            <label for="date-event">date event</label>
            <input type="date" id="date-event" required>

            <label for="name-event">name event</label>
            <input type="text" id="name-event" minlength="3" maxlength="50" required>

            <label for="comment-event">comment</label>
            <input type="text" id="comment-event" name="comment">

            <input type="hidden" name="csrf-admin-form" value="<?= $csrfAdminForm ?>">
            <button type="submit" onsubmit="return ">send</button>
        </form>
    </div>
</main>

<?php
require './includes/footer.php';
?>