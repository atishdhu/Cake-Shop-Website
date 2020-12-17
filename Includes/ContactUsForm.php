<?php 
echo '
<div class="contact-section">
    <div class="contact-us">
        <div class="subtitle">
            <h2>CONTACT US</h2>
            <p>Our Company is the best, meet the creative team that never sleeps. Say something to us we will answer to you.</p>
        </div>
        <form action="#">
            <label for="customerName">NAME <em>&#x2a;</em></label>
            <input id="customerName" name="customerName" required="" type="text" />
            <label for="customerEmail">EMAIL <em>&#x2a;</em></label>
            <input id="customerEmail" name="customerEmail" required="" type="email" />
            <label for="customerPhone">PHONE</label>
            <input id="customerPhone" name="customerPhone" pattern="[/0-9]{8}|[/0-9]{7}" type="tel" />
            <label for="orderNumber">ORDER NUMBER</label>
            <input id="orderNumber" name="orderNumber" type="text" />
            <label for="customerNote">YOUR MESSAGE <em>&#x2a;</em></label>
            <textarea id="customerNote" name="customerNote" required="" rows="4"></textarea>
            <div class="push-button">
                <button id="submit">SUBMIT</button>
            </div>
        </form>
    </div>
</div>
'
?>