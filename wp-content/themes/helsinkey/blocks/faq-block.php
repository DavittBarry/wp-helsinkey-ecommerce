<!-- FAQ -->
<div class="faq-section py-6 md:py-12">
    <div class="container mx-auto">
        <h2 class=
        "text-2xl
        md:text-3xl
        font-semibold
        mb-4
        md:mb-6
        text-center">Usein kysytyt kysymykset</h2>
        <?php
        $faq = get_field('faq');
        if ($faq) :
            ?>
            <ul class="space-y-4">
                <!-- Question 1 -->
                <li>
                    <h3 class="text-xl font-semibold">
                        Onko tämä oikea soitin- ja musiikkikauppa?</h3>
                    <p class="text-lg">Ei, tämä on vain portfolio-tarkoituksiin.</p>
                </li>
                <!-- Question 2 -->
                <li>
                    <h3 class="text-xl font-semibold">
                        Voinko laittaa omia ilmoituksia bändin jäsentä varten?</h3>
                    <p class="text-lg">Totta kai!</p>
                </li>
                <!-- Question 3 -->
                <li>
                    <h3 class="text-xl font-semibold">
                        Onko sivustolla käytetty valmiita teemoja?</h3>
                    <p class="text-lg">Ei, kaikki on koodattu yksilöllisesti.</p>
                </li>
            </ul>
        <?php endif; ?>
    </div>
</div>