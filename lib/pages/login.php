<?php session_start();?>
<div class='login-area' style="background-image: url('../../images/main-bg1.jpg');">
<div class="d-table">
    <div class="d-table-cell">
        <div class="login-form">
            <h3>GDG - WTM | Admin</h3>

            <form action="lib/api/login-form.php" method="POST">
                <div class="form-group">
                    <label for="user-name">Kullanıcı Adı</label>
                    <input type="text" class="form-control" id="user-name" name="user-name" placeholder="Kullanıcı Adı" required >
                </div>

                <div class="form-group">
                    <label for="passwd">Password</label>
                    <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Şifre" required>
                </div>

                <?php 
                    
                    if (isset($_SESSION['login-error'])) { 
                        echo "<p class='error'>" . htmlspecialchars($_SESSION['login-error']) . "</p>";
                        unset($_SESSION['login-error']);
                    }
                    ?>

                <button type="submit" class="primary primary-btn">
                    Giriş
                </button>
            </form>
        </div>
    </div>
</div>
</div>