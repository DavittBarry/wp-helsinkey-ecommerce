<?php
/* Template Name: Tietosuojakäytäntö */

$current_language = function_exists('pll_current_language') ? pll_current_language() : 'default';
    if ($current_language === 'en') {
        get_header('english');
    } else {
        get_header();
    }
?>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl mt-6 font-semibold mb-4 text-center">Tietosuojakäytäntö</h1>

    <section class="mb-8">
        <h2 class="text-3xl mb-4">Rekisterinpitäjä</h2>
        <p>
            Yrityksen nimi: <span class="font-semibold">Helsinkey</span><br>
            Sähköposti: <a href="mailto:davittbarry333@gmail.com" class="font-semibold">davittbarry333@gmail.com</a>
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-3xl mb-4">Henkilötietojen käsittelyn tarkoitus</h2>
        <p>
            Keräämme henkilötietoja palvelun käyttökokemuksen parantamiseksi ja asiakassuhteiden ylläpitämiseksi.
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-3xl mb-4">Rekisterin tietosisältö</h2>
        <ul>
            <li>Nimi</li>
            <li>Sähköpostiosoite</li>
            <li>Puhelinnumero</li>
            <li>Osoite</li>
        </ul>
    </section>

    <section class="mb-8">
        <h2 class="text-3xl mb-4">Tietojen luovutus</h2>
        <p>
            Tietoja ei luovuteta kolmansille osapuolille.
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-3xl mb-4">Oikeudet ja vaikutusmahdollisuudet</h2>
        <p>
            Rekisteröidyllä on oikeus tarkastaa, muuttaa tai poistaa henkilötietonsa.
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-3xl mb-4">Evästeet</h2>
        <p>
            Käytämme evästeitä palvelun käyttökokemuksen parantamiseksi.
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-3xl mb-4">Muutokset tietosuojakäytäntöön</h2>
        <p>
            Pidätämme oikeuden muuttaa tätä tietosuojakäytäntöä.
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-3xl mb-4">Yhteystiedot</h2>
        <p>
            Kaikki pyynnöt ja kysymykset liittyen tähän tietosuojakäytäntöön tulee lähettää sähköpostitse osoitteeseen <a href="mailto:davittbarry333@gmail.com" class="font-semibold">davittbarry333@gmail.com</a>.
        </p>
    </section>
</div>

<?php get_footer(); ?>
