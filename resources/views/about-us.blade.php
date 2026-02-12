@extends('layout.app')

@section('content')

<h2 class="page-title reveal delay-1">About Us</h2>

{{-- 🏍 BRAND INTRO --}}
        <div style="text-align:center; margin-bottom:40px;">
            <h3 style="color:#e53935; font-size:26px;">Rider’s Den</h3>

            <p style="max-width:650px; margin:15px auto; line-height:1.8;">
                Rider’s Den is built for passionate riders who demand performance,
                reliability, and style. We provide premium bike accessories and parts
                trusted by riders who live for the road.
            </p>
        </div>

<div class="profile-wrapper reveal delay-1">

    <div class="profile-card reveal delay-2" style="max-width:1000px;margin:auto;padding:40px;">
       
        <!-- 📍 Location Animation -->
<div class="about-lottie-spotlight reveal delay-2">

    <script
      src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.11/dist/dotlottie-wc.js"
      type="module">
    </script>

    <dotlottie-wc
      src="https://lottie.host/c370e901-24bc-4b2b-aa4d-2935a167c656/o6iUQIYM3L.lottie"
      autoplay
      loop>
    </dotlottie-wc>

</div>
        
        {{-- 🔻 DIVIDER --}}
        <hr style="border-color:#222; margin:40px 0;">

        {{-- 📞 CONTACT + MAP --}}
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:50px; align-items:flex-start;">

            {{-- 📞 CONTACT INFO --}}
            <div>
                <h4 style="color:#e53935; margin-bottom:20px;">Contact Us</h4>
                <p style="margin-bottom:14px;">
    <i class="fa fa-location-dot reveal delay-3"></i>
    <strong> Address:</strong><br>
    No. 41, Harshan Nilaya,<br>
    Mysore Lamps Layout,<br>
    Channayakanapalya,<br>
    Nagasandra Post,<br>
    Bengaluru – 560073
</p>

                <p style="margin-bottom:14px;">
                    <i class="fa fa-phone reveal delay-3"></i>
                    <strong> Phone:</strong> 9945545188
                </p>

                <p style="margin-bottom:14px;">
                    <i class="fa fa-envelope reveal delay-4"></i>
                    <strong> Email:</strong> harshan.tn46@gmail.com
                </p>

                <p style="margin-bottom:14px;">
                    <i class="fa fa-location-dot reveal delay-2"></i>
                    <strong> Store Location</strong>
                </p>

                <a href="https://maps.app.goo.gl/9ZgogiaUYWEjSRKp9"
   target="_blank"
   class="action-btn secondary reveal delay-1"
   style="white-space:nowrap; display:inline-flex; align-items:center;">
    📍 Open in Google Maps
</a>
 
            </div>
 {{-- 🗺 MAP --}}
            <div>
                <h4 style="color:#e53935; margin-bottom:20px;">Our Location</h4>

                <iframe
                    src="https://www.google.com/maps?q=13.0121,77.5871&output=embed"
                    width="100%"
                    height="260"
                    style="border-radius:14px;border:2px solid #e53935;"
                    loading="lazy">
                </iframe>
            </div>
        </div>

    </div>

</div>
{{-- ℹ INFORMATION SECTION --}}
<div class="divider reveal delay-1"></div>

<h2 style="color:#e53935; margin-bottom:20px; font-weight:600;">Information</h2>

<div class="info-accordion reveal delay-4">

    {{-- PRIVACY POLICY --}}
    <div class="info-item reveal delay-3">
        <button type="button" class="info-toggle reveal delay-4" onclick="toggleInfo(this)">
            <span>Privacy Policy</span>
            <i class="fa fa-plus reveal delay-2"></i>
        </button>

        <div class="info-content reveal delay-1">

    <p><strong>Last updated:</strong> 2026</p>

    <p>
        At <strong>Rider’s Den</strong>, your privacy is extremely important to us.
        This Privacy Policy document explains in detail how we collect, use,
        protect, and disclose your information when you use our website or services.
    </p>

    <h5>1. Information We Collect</h5>
    <p>
        We collect different types of information to provide and improve our services.
        This may include:
    </p>
    <ul>
        <li>Personal details such as name, email address, phone number</li>
        <li>Delivery and billing address</li>
        <li>Order details including products purchased and quantity</li>
        <li>Payment method (cash / UPI / online)</li>
        <li>Login credentials (stored in encrypted form)</li>
        <li>IP address, browser type, device information</li>
    </ul>

    <h5>2. How We Collect Information</h5>
    <p>
        Information is collected when you:
    </p>
    <ul>
        <li>Create an account</li>
        <li>Place an order</li>
        <li>Update your profile or address</li>
        <li>Contact customer support</li>
        <li>Use features such as order tracking</li>
    </ul>

    <h5>3. How We Use Your Information</h5>
    <p>
        Your information is used for the following purposes:
    </p>
    <ul>
        <li>Processing and delivering your orders</li>
        <li>Sending order confirmations and delivery updates</li>
        <li>Providing customer support</li>
        <li>Improving website functionality and user experience</li>
        <li>Preventing fraudulent activities</li>
        <li>Complying with legal obligations</li>
    </ul>

    <h5>4. Payment & Financial Information</h5>
    <p>
        Rider’s Den does not store or process your debit/credit card details.
        All online payments are securely processed through trusted third-party
        payment gateways. We only store:
    </p>
    <ul>
        <li>Payment status (paid / unpaid)</li>
        <li>Payment method (cash / UPI / online)</li>
    </ul>

    <h5>5. Data Protection & Security</h5>
    <p>
        We implement strict security measures to protect your data, including:
    </p>
    <ul>
        <li>Password encryption and hashing</li>
        <li>Secure servers and restricted access</li>
        <li>Regular system monitoring</li>
    </ul>
    <p>
        However, no method of data transmission over the internet is 100% secure.
        While we strive to protect your data, absolute security cannot be guaranteed.
    </p>

    <h5>6. Sharing of Information</h5>
    <p>
        We do not sell, trade, or rent your personal information to third parties.
        Information may only be shared with:
    </p>
    <ul>
        <li>Delivery partners (only for order fulfillment)</li>
        <li>Legal authorities when required by law</li>
    </ul>

    <h5>7. Cookies & Tracking Technologies</h5>
    <p>
        Our website may use cookies and similar technologies to:
    </p>
    <ul>
        <li>Remember user preferences</li>
        <li>Improve site performance</li>
        <li>Analyze traffic and usage patterns</li>
    </ul>
    <p>
        You may disable cookies through your browser settings, but some features
        of the website may not function properly.
    </p>

    <h5>8. User Accounts & Responsibilities</h5>
    <p>
        You are responsible for maintaining the confidentiality of your account
        credentials. Any activity performed using your account is your responsibility.
        Please notify us immediately if you suspect unauthorized access.
    </p>

    <h5>9. Third-Party Services</h5>
    <p>
        Our website may contain links or integrations with third-party services
        such as Google Maps. Rider’s Den is not responsible for the privacy policies
        or practices of third-party websites.
    </p>

    <h5>10. Data Retention</h5>
    <p>
        We retain your personal information only as long as necessary to:
    </p>
    <ul>
        <li>Fulfill orders</li>
        <li>Provide support</li>
        <li>Meet legal and accounting requirements</li>
    </ul>

    <h5>11. User Rights</h5>
    <p>
        You have the right to:
    </p>
    <ul>
        <li>Access your personal data</li>
        <li>Update or correct inaccurate information</li>
        <li>Request deletion of your account (subject to legal obligations)</li>
    </ul>

    <h5>12. Children’s Privacy</h5>
    <p>
        Rider’s Den does not knowingly collect personal information from children
        under the age of 13. If such data is identified, it will be removed immediately.
    </p>

    <h5>13. Changes to This Policy</h5>
    <p>
        We may update this Privacy Policy from time to time. Any changes will be
        reflected on this page with an updated revision date.
    </p>

    <h5>14. Contact Information</h5>
    <p>
        If you have any questions or concerns regarding this Privacy Policy,
        please contact us:
    </p>
    <p>
        📞 Phone: 9945545188<br>
        📧 Email: harshan.tn46@gmail.com
    </p>

</div>

    </div>

    {{-- REFUND POLICY --}}
    <div class="info-item reveal delay-4">
        <button type="button" class="info-toggle reveal delay-3" onclick="toggleInfo(this)">
            <span>Refund Policy</span>
            <i class="fa fa-plus reveal delay-4"></i>
        </button>

        <div class="info-content reveal delay-1">

    <p><strong>Last updated:</strong> 2026</p>

    <p>
        At <strong>Rider’s Den</strong>, customer satisfaction is our priority.
        We carefully inspect and pack all products before shipping. However, if you
        receive a product that is damaged, defective, or incorrect, you may be
        eligible for a refund or replacement subject to the terms outlined below.
    </p>

    <p>
        Refund requests are accepted only in cases where the delivered product is
        physically damaged, defective, or different from what was ordered. To be
        eligible for a refund, the issue must be reported within <strong>48 hours</strong>
        of delivery. Requests made after this period may not be considered.
    </p>

    <p>
        To initiate a refund, customers must contact our support team with clear
        photographic or video evidence of the issue. This helps us verify the claim
        quickly and efficiently. Once the request is reviewed and approved, we will
        proceed with the refund or replacement process.
    </p>

    <p>
        Products that have been used, altered, or damaged due to improper handling
        by the customer are not eligible for refunds. Items returned without original
        packaging, accessories, or proof of purchase may also be rejected.
    </p>

    <p>
        Refunds, if approved, will be processed using the original payment method.
        For online or UPI payments, the refunded amount will be credited back within
        5–7 business days depending on the bank or payment provider. Cash-on-delivery
        refunds will be processed through a suitable alternative method after
        verification.
    </p>

    <p>
        Shipping charges, if any, are non-refundable unless the return is due to an
        error on our part. Rider’s Den reserves the right to decline refund requests
        that do not comply with our policy guidelines.
    </p>

    <p>
        In certain cases, we may offer a replacement instead of a refund if the same
        product is available. Replacement delivery timelines may vary based on stock
        availability and location.
    </p>

    <p>
        Rider’s Den reserves the right to modify or update this Refund Policy at any
        time without prior notice. Any changes will be reflected on this page and
        will apply to future purchases.
    </p>

    <p>
        For any refund-related queries or assistance, please contact us:
        <br>
        📞 Phone: 9945545188<br>
        📧 Email: harshan.tn46@gmail.com
    </p>

</div>

    </div>

    {{-- SHIPPING POLICY --}}
    <div class="info-item reveal delay-2">
        <button type="button" class="info-toggle reveal delay-3" onclick="toggleInfo(this)">
            <span>Shipping Policy</span>
            <i class="fa fa-plus reveal delay-4"></i>
        </button>

        <div class="info-content reveal delay-1">

    <p><strong>Last updated:</strong> 2026</p>

    <p>
        At <strong>Rider’s Den</strong>, we strive to ensure that your orders are
        processed and delivered in a timely and secure manner. Once an order is
        successfully placed and confirmed, it is prepared for dispatch as quickly
        as possible.
    </p>

    <p>
        Orders are generally processed within <strong>5 to 10 days</strong> from
        the time of confirmation, excluding Sundays and public holidays. During
        periods of high demand or special promotions, processing times may be
        slightly extended.
    </p>

    <p>
        Shipping timelines may vary depending on the delivery location, courier
        partner availability, and external factors such as weather conditions or
        regional restrictions. Estimated delivery times will be communicated at
        the time of order confirmation whenever possible.
    </p>

    <p>
        Once an order is dispatched, customers may receive shipment-related updates
        through the contact information provided during checkout. Rider’s Den is
        not responsible for delays caused by incorrect address details provided by
        the customer.
    </p>

    <p>
        We currently ship to selected locations within our serviceable regions.
        Orders placed outside these regions may not be eligible for delivery.
        In such cases, customers will be notified and the order may be cancelled
        or refunded as applicable.
    </p>

    <p>
        Shipping charges, if applicable, will be clearly displayed during the
        checkout process. Any additional charges incurred due to failed delivery
        attempts or address changes requested after dispatch may be borne by the
        customer.
    </p>

    <p>
        Customers are requested to ensure availability at the delivery address
        at the time of delivery. Rider’s Den is not responsible for unsuccessful
        delivery attempts due to customer unavailability.
    </p>

    <p>
        In rare cases of shipment loss or damage during transit, customers should
        contact our support team immediately. We will investigate the issue with
        the courier partner and take appropriate action as per our policies.
    </p>

    <p>
        Rider’s Den reserves the right to update or modify this Shipping Policy
        at any time without prior notice. Any changes will be reflected on this
        page and will apply to future orders.
    </p>

    <p>
        For shipping-related questions or assistance, please contact us:
        <br>
        📞 Phone: 9945545188<br>
        📧 Email: harshan.tn46@gmail.com
    </p>

</div>

    </div>

    {{-- TERMS & CONDITIONS --}}
    <div class="info-item reveal delay-2">
        <button type="button" class="info-toggle reveal delay-3" onclick="toggleInfo(this)">
            <span>Terms & Conditions</span>
            <i class="fa fa-plus reveal delay-4"></i>
        </button>

       <div class="info-content revesl delay-1">

    <p><strong>Last updated:</strong> 2026</p>

    <p>
        Welcome to <strong>Rider’s Den</strong>. By accessing or using our website,
        services, or placing an order, you agree to comply with and be bound by
        the following Terms and Conditions. Please read them carefully before
        using our website. If you do not agree with any part of these terms,
        you should not use our services.
    </p>

    <p>
        Rider’s Den reserves the right to update, modify, or replace any part
        of these Terms and Conditions at any time without prior notice. Any
        changes will be effective immediately upon posting on this page.
        Continued use of the website after changes are made constitutes
        acceptance of those changes.
    </p>

    <p>
        By using this website, you confirm that you are at least 18 years old
        or accessing the website under the supervision of a legal guardian.
        You agree to provide accurate, current, and complete information when
        creating an account or placing an order. Rider’s Den is not responsible
        for issues arising due to incorrect information provided by the user.
    </p>

    <p>
        All products listed on Rider’s Den are subject to availability. We
        reserve the right to limit quantities, discontinue products, or modify
        product descriptions and pricing at any time without prior notice.
        While we strive to ensure accuracy, errors in product information,
        pricing, or availability may occur.
    </p>

    <p>
        Orders placed through the website are subject to acceptance and
        confirmation. Rider’s Den reserves the right to cancel or refuse any
        order for reasons including but not limited to product unavailability,
        pricing errors, suspected fraud, or violation of these Terms and
        Conditions.
    </p>

    <p>
        All payments must be made through the available payment methods
        displayed during checkout. Payment information is processed securely
        through third-party payment gateways. Rider’s Den does not store
        sensitive payment details such as card numbers or CVV information.
    </p>

    <p>
        Users are responsible for maintaining the confidentiality of their
        account credentials. Any activity conducted through a user account
        will be deemed the responsibility of the account holder. Rider’s Den
        shall not be liable for losses resulting from unauthorized account use.
    </p>

    <p>
        The use of this website for unlawful, fraudulent, or harmful purposes
        is strictly prohibited. Users must not attempt to disrupt website
        functionality, access restricted areas, or misuse any content or
        services provided by Rider’s Den.
    </p>

    <p>
        All content on this website, including logos, images, product
        descriptions, designs, and text, is the intellectual property of
        Rider’s Den and is protected by applicable copyright and trademark
        laws. Unauthorized reproduction, distribution, or use of this content
        is strictly prohibited.
    </p>

    <p>
        Rider’s Den shall not be liable for any indirect, incidental, special,
        or consequential damages arising from the use or inability to use the
        website or products purchased, including but not limited to loss of
        profits, data, or business opportunities.
    </p>

    <p>
        Delivery timelines provided are estimates only. Rider’s Den is not
        responsible for delays caused by courier partners, weather conditions,
        government restrictions, or other factors beyond our control.
    </p>

    <p>
        In the event of disputes arising from the use of this website or
        purchases made, the matter shall be governed by the laws applicable
        in India. Any legal proceedings shall be subject to the jurisdiction
        of the appropriate courts.
    </p>

    <p>
        By continuing to use Rider’s Den, you acknowledge that you have read,
        understood, and agreed to these Terms and Conditions in full.
    </p>

    <p>
        If you have any questions or concerns regarding these Terms and
        Conditions, please contact us:
        <br>
        📞 Phone: 9945545188<br>
        📧 Email: harshan.tn46@gmail.com
    </p>

</div>

    </div>

</div>

{{-- 🏷 BRANDS SECTION --}}

<div class="divider reveal delay-1"></div>
<h4 class="brands-title reveal delay-4">Our Brands</h4>

<div class="brands-viewport">
    <div class="brands-track" id="brandsTrack">

        <!-- repeat logos if needed for smooth looping -->
        <div class="brand-slide"><img src="/images/brands/brand1.png"></div>
        <div class="brand-slide"><img src="/images/brands/brand2.png"></div>
        <div class="brand-slide"><img src="/images/brands/brand3.png"></div>
        <div class="brand-slide"><img src="/images/brands/brand4.png"></div>
        <div class="brand-slide"><img src="/images/brands/brand5.png"></div>
        <div class="brand-slide"><img src="/images/brands/brand6.png"></div>
        <div class="brand-slide"><img src="/images/brands/brand7.png"></div>
        <div class="brand-slide"><img src="/images/brands/brand8.png"></div>
        <div class="brand-slide"><img src="/images/brands/brand9.png"></div>
        <div class="brand-slide"><img src="/images/brands/brand10.png"></div>
        <div class="brand-slide"><img src="/images/brands/brand11.png"></div>
        <div class="brand-slide"><img src="/images/brands/brand12.png"></div>
        <div class="brand-slide"><img src="/images/brands/brand13.png"></div>
        <div class="brand-slide"><img src="/images/brands/brand14.png"></div>
    </div>
</div>


<script>
const track = document.getElementById('brandsTrack');
const slides = document.querySelectorAll('.brand-slide');
const viewport = document.querySelector('.brands-viewport');

let index = 0;
let isResetting = false;

function moveBrands() {

    slides.forEach(slide => slide.classList.remove('active'));

    const activeSlide = slides[index];
    activeSlide.classList.add('active');

    const viewportWidth = viewport.offsetWidth;
    const slideCenter =
        activeSlide.offsetLeft -
        viewportWidth / 2 +
        activeSlide.offsetWidth / 2;

    track.style.transition = 'transform 0.6s ease';
    track.style.transform = `translateX(-${slideCenter}px)`;

    index++;

    /* 🔁 WHEN LAST SLIDE IS DONE → RESET TO FIRST */
    if (index >= slides.length) {
        setTimeout(() => {
            track.style.transition = 'none';
            track.style.transform = 'translateX(0px)';

            slides.forEach(slide => slide.classList.remove('active'));
            slides[0].classList.add('active');

            index = 1; // start cleanly from 2nd next
        }, 700); // must be > transition time
    }
}

moveBrands();
setInterval(moveBrands, 2200);
</script>


<script>
function toggleInfo(button) {
    const content = button.nextElementSibling;
    const icon = button.querySelector('i');

    if (content.style.display === "block") {
        content.style.display = "none";
        icon.classList.remove('fa-minus');
        icon.classList.add('fa-plus');
    } else {
        content.style.display = "block";
        icon.classList.remove('fa-plus');
        icon.classList.add('fa-minus');
    }
}
</script>

@endsection
