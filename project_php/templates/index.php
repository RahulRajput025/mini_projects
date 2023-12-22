<?php session_start(); ?>
<?php include '../includes/header.php' ?>

<!-- Navigation-->
<?php include '../includes/navigation.php' ?>

<div class="container">
    <!-- Carousel Starts -->
    <h1 class="text-center my-4">Welcome
        <?php echo $_SESSION['name']; ?>
    </h1>
    <div class="row justify-content-center ">
        <div class="col-lg-12 col-md-12">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../assets/images/law-2.jpg" class=" img-fluid  h-10 w-80 " alt="...">
                    </div>
                    <div class="carousel-item ">
                        <img src="../assets/images/5910911.jpg" class=" img-fluid h-10 w-80 " alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../assets/images/law-luffy.jpg" class=" img-fluid  h-10 w-80 " alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <!-- Carousel Ends -->

    <div class="row text-center">
        <div class="col-md-12">
            <h2 class="mt-5 mb-2">Small Description</h2>
            <p class="index_paragraph">Giyu Tomioka is one of the most popular characters from Demon Slayer: Kimetsu
                no Yaiba. It’s no
                surprise that he has appeared since the beginning of the story, and he has an interesting
                personality. Tomioka Giyu has a unique appearance. In this anime, he is described as a young man who
                has a thin and tall body. His hair is black and long. He often ties his hair back. His eyes are so
                firm with a dark blue color. He can control and master the Breath of Water technique. He is also
                able to conquer Akaza and can master 10 techniques. In fact, he was also able to develop the next
                technique, the 11th technique.<br><br>
                Giyu Tomioka is a major character in the popular Japanese manga and anime series Demon Slayer:
                Kimetsu no Yaiba. He is one of the main characters in the series and serves as a supporting
                character to the protagonist Tanjiro Kamado. Giyu is a skilled demon slayer who plays an important
                role in the story’s overarching plot. Giyu’s character is known for his stoic and serious demeanor.
                He rarely shows any emotion and is always focused on his mission to defeat demons. Despite his
                stoicism Giyu is shown to be fiercely dedicated to his job as a demon slayer and will do whatever it
                takes to protect innocent people from the demons. Giyu’s combat abilities are highly developed and
                he is one of the most skilled demon slayers in the series. He is proficient in both swordsmanship
                and water breathing techniques which he uses to defeat demons. Giyu’s water breathing techniques are
                particularly impressive as they allow him to manipulate water and create powerful attacks that can
                easily dispatch even the strongest demons. In addition to his combat abilities Giyu is also a
                skilled strategist. He is able to analyze a situation quickly and determine the best course of
                action to take. This makes him a valuable member of the demon slayer corps as he is able to help his
                fellow demon slayers navigate difficult situations and come up with plans to defeat the demons they
                are facing. Giyu’s past is revealed throughout the series and it is shown that he has a tragic
                backstory. He was responsible for training a fellow demon slayer Sabito and his younger sister,
                Makomo. However during their training both Sabito and Makomo were killed by a powerful demon. This
                event had a significant impact on Giyu causing him to become even more stoic and serious than
                before.</p>
        </div>
    </div>
</div>









<?php include '../includes/footer.php' ?>