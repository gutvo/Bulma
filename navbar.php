<nav class="navbar is-dark" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <?php if (isset($_SESSION["nomeusuario"])){
                        echo "
                            <a class='navbar-item'>
                            <h3 class='title is-5 has-text-white'>Bem-vindo <spam class='has-text-warning'>".$_SESSION["nomeusuario"]."!</spam>
                            </h3>
                            </a>
                        ";}?>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">

            <?php if(isset($_SESSION["nomeusuario"])){
                echo"<a class='navbar-item' href='index.php'>Tela Inicial</a>
                <a class='navbar-item' href='home.php'>Home</a>
                <a class='navbar-item' href='sites.php'>Sites</a>";
            }else{
                echo "<a class='navbar-item' href='index.php'>Tela Inicial</a>";
            }
        ?>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <?php
                        if(isset($_SESSION["nomeusuario"])){
                            echo "<a class='button is-danger' href='logout.php?token='><strong>Sair</strong></a>";
                        }else{
                            echo "<a class='button is-primary' href='formulario_cadastro'><strong>Cadastrar</strong></a>
                            <a class='button is-light' href='login.php'>Logar</a>
                            ";
                            
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</nav>


<script>
document.addEventListener('DOMContentLoaded', () => {

    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    // Add a click event on each of them
    $navbarBurgers.forEach(el => {
        el.addEventListener('click', () => {

            // Get the target from the "data-target" attribute
            const target = el.dataset.target;
            const $target = document.getElementById(target);

            // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
            el.classList.toggle('is-active');
            $target.classList.toggle('is-active');

        });
    });

});
</script>