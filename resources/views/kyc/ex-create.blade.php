<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>KYC User Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .step:not(.current) {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container mx-auto p-8">
        <h1 class="text-3xl mb-8">KYC User Verification</h1>
        <form id="kycForm" method="POST" action="process_kyc.php">
            <!-- Step 1: Personal Information -->
            <fieldset class="step current">
                <h2 class="text-2xl mb-4">Step 1: Personal Information</h2>
                <input type="text" name="full_name" placeholder="Full Name" required class="input-field mb-4">
                <input type="text" name="address" placeholder="Address" required class="input-field mb-4">
                <input type="email" name="email" placeholder="Email" required class="input-field mb-4">
                <button type="button" class="btn-next btn-blue">Next</button>
            </fieldset>

            <!-- Step 2: Identity Verification -->
            <fieldset class="step">
                <h2 class="text-2xl mb-4">Step 2: Identity Verification</h2>
                <input type="text" name="id_number" placeholder="ID Number" required class="input-field mb-4">
                <input type="text" name="date_of_birth" placeholder="Date of Birth" required
                    class="input-field mb-4">
                <input type="file" name="id_document" required class="input-field mb-4">
                <button type="button" class="btn-prev btn-blue">Previous</button>
                <button type="button" class="btn-next btn-blue">Next</button>
            </fieldset>

            <!-- Step 3: Additional Documents -->
            <fieldset class="step">
                <h2 class="text-2xl mb-4">Step 3: Additional Documents</h2>
                <input type="file" name="proof_of_address" required class="input-field mb-4">
                <input type="file" name="additional_document" required class="input-field mb-4">
                <button type="button" class="btn-prev btn-blue">Previous</button>
                <button type="submit" class="btn-submit btn-blue">Submit</button>
            </fieldset>
        </form>
    </div>

    <script>
        const form = document.getElementById('kycForm');
        const steps = Array.from(form.querySelectorAll('.step'));
        let currentStep = 0;

        function showStep(stepIndex) {
            steps.forEach((step, index) => {
                step.classList.toggle('current', index === stepIndex);
            });
        }

        function validateStep() {
            const fields = Array.from(steps[currentStep].querySelectorAll('input[required]'));
            let isValid = true;

            fields.forEach((field) => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('border', 'border-red-500');
                } else {
                    field.classList.remove('border', 'border-red-500');
                }
            });

            return isValid;
        }

        function navigateToStep(step) {
            if (validateStep()) {
                showStep(step);
            }
        }

        function navigateNext() {
            navigateToStep(currentStep + 1);
        }

        function navigatePrev() {
            navigateToStep(currentStep - 1);
        }

        const nextBtns = Array.from(form.querySelectorAll('.btn-next'));
        const prevBtns = Array.from(form.querySelectorAll('.btn-prev'));

        nextBtns.forEach((btn) => {
            btn.addEventListener('click', navigateNext);
        });

        prevBtns.forEach((btn) => {
            btn.addEventListener('click', navigatePrev);
        });
    </script>
</body>

</html>
