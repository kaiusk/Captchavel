<script src="https://www.google.com/recaptcha/api.js?render={{ $key }}&onload=captchavelCallback" defer></script>
<script>
    // Start Captchavel Script
    const captchavelCallback = function () {
        let site_key = "{{ $key }}";

        if (site_key === '') {
            console.error("You haven't set your Site Key for reCAPTCHA v3. Get it on https://g.co/recaptcha/admin.");
            return;
        }

        Array.from(document.getElementsByTagName('form'))
            .filter((form) => form.dataset.recaptcha === 'true')
            .forEach((form) => {
                grecaptcha.execute(site_key, { action: form.action }).then((token) => {
                    if (token) {
                        let child = document.createElement('input');

                        child.setAttribute('type', 'hidden');
                        child.setAttribute('name', '_recaptcha');
                        child.setAttribute('value', token);

                        form.appendChild(child);
                    }
                });
            });
    };
    // End Captchavel Script
</script>