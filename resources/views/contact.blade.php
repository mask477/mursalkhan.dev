@extends('partials.layout', [
"footer_title" => "Go Back Home",
"footer_url" => route('home')
])

@section('content')
<div title="Contact" class="page-bg-title verticle">
    <h1 class="no-highlight" aria-hidden="true">Contact</h1>
</div>
<section class="page-section">

    <div class="main-content">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-10">
                    <h1 class="title">Contact.</h1>

                    <article>
                        <p>Get in touch or shoot me an email on <b>{{ env("MAIL_FROM_ADDRESS") }}</b></p>
                    </article>

                    <br>

                    <form action="{{ env('FORM_SPREE_CONTACT_FORM') }}" method="POST" class="contact-form"
                        id="contactForm">
                        <div class="fields">
                            <div class="field half">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name"
                                    aria-required="true" required="" />
                            </div>
                            <div class="field half">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                                    aria-required="true" required="" />
                            </div>
                            <div class="field half">
                                <textarea name="message" id="message" rows="5" class="form-control"
                                    placeholder="Message" aria-required="true" required=""></textarea>
                            </div>
                        </div>

                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_V2_SITE_KEY') }}"></div>

                        <button class="btn btn-default" type="submit" aria-label="Send Message">
                            Send Message
                        </button>

                        <p id="contactFormStatus"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>
    var form = document.getElementById("contactForm");

    async function handleSubmit(event) {
        console.log("HANDEL SUBMIT");
        event.preventDefault();
        var status = document.getElementById("contactFormStatus");
        var data = new FormData(event.target);

        fetch(event.target.action, {
            method: form.method,
            body: data,
            headers: {
                'Accept': 'application/json'
            }
        }).then(response => {
            console.log("RESPONSE:", response);
            if (response.ok) {
                status.innerHTML = "Thanks for your submission!";
                form.reset();
            } else {
                response.json().then(data => {
                    console.log("DATA:", data);
                    if (Object.hasOwn(data, 'errors')) {
                        status.innerHTML = data["errors"].map(error => error["message"]).join(", ")
                    } if (Object.hasOwn(data, 'error')) {
                        if(data.error == "reCAPTCHA failed") {
                            status.innerHTML = "Please fill the recaptcha";
                        }
                    } else {
                        status.innerHTML = "Oops! There was a problem submitting your form"
                    }
                })
            }
        }).catch(error => {
            status.innerHTML = "Oops! There was a problem submitting your form"
            console.error(error);
        });
    }
    form.addEventListener("submit", handleSubmit);
</script>
@endpush