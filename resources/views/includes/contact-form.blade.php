<div class="form">
    <div id="sendmessage"
         style="display: none;color:darkgreen">Your message has been sent. Thank you!</div>
    <div id="errormessage"
         style="display: none;color:red">Please reload the page and try again!</div>
    <form action="{{ route('contact.submit') }}"
          method="post"
          role="form"
          id="contact-form"
          class="contactForm mt-4">
        @csrf
        <div class="form-group">
            <input type="text"
                   required
                   name="name"
                   class="form-control"
                   id="name"
                   placeholder="Your Name"
                   required />
            <span style="color:red"
                  class="d-none"
                  id="invalid-name">Invalid name format</span>
        </div>
        <div class="form-group">
            <input type="email"
                   required
                   class="form-control"
                   name="email"
                   id="email"
                   placeholder="Your Email"
                   required />
        </div>
        <div class="form-group">
            <input type="text"
                   required
                   class="form-control"
                   name="subject"
                   id="subject"
                   placeholder="Subject"
                   required />
        </div>
        <div class="form-group">
            <textarea class="form-control"
                      name="message"
                      rows="5"
                      required
                      max="200"
                      maxlength="200"
                      placeholder="Message (200 character)"></textarea>
        </div>
        <div class="g-recaptcha"
             data-sitekey="{{setting('site.recaptcha_site_key')}}"></div>
        <button type="submit"
                class="mt-3 btn btn-primary">Send Message</button>
    </form>
</div>