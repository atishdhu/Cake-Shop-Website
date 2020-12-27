<?php include "./AdditionalPHP/checkAccess.php"; ?>

<head>
    <script defer src="validateNewsletterInput.js"></script>
</head>

<section class="newsletter newsletter-section" id="subscribed">
    <div id="subscribe-section" class="newsletter__container bd-grid">
        <div class="newsletter__subscribe subtitle">
            <h2 class="section-title">NEWSLETTER</h2>
            <p class="newsletter__description">Be the first to get informed about our best deals!</p>
            
            <form id="newsletterForm" class="newsletter__form" method="POST" action="validateNewsletterInput.php">
                <input id="mail" class="newsletter__input" name="mail" required type="mail" placeholder="Enter your mail"/>
                
                <div class="subscribe-button-container">
                    <span><button id="subscribe" class="subscribe-button" name="subscribe" type="submit">SUBSCRIBE</button></span>
                </div>
            </form>
            
            <br>
            <span id="errorMessage" class="send-input-message"></span>
        </div>
    </div>
</section>