<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<style>
    * {
        font-family: 'Inter', sans-serif;
    }
</style>

<body style="background-color: #f4f4f4">

    {{ $slot }}
    @livewireScripts
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 800,
        });
        window.addEventListener('load', () => {
            document.getElementById('loader').style.display = 'none';
        });

        window.addEventListener('load', function() {
            const clipboard = FlowbiteInstances.getInstance('CopyClipboard', 'npm-install-copy-button');
            const tooltip = FlowbiteInstances.getInstance('Tooltip', 'tooltip-copy-npm-install-copy-button');

            const $defaultIcon = document.getElementById('default-icon');
            const $successIcon = document.getElementById('success-icon');

            const $defaultTooltipMessage = document.getElementById('default-tooltip-message');
            const $successTooltipMessage = document.getElementById('success-tooltip-message');

            clipboard.updateOnCopyCallback(() => {
                showSuccess();
                setTimeout(resetToDefault, 2000);
            });

            const showSuccess = () => {
                $defaultIcon.classList.add('hidden');
                $successIcon.classList.remove('hidden');
                $defaultTooltipMessage.classList.add('hidden');
                $successTooltipMessage.classList.remove('hidden');
                tooltip.show();
            }

            const resetToDefault = () => {
                $defaultIcon.classList.remove('hidden');
                $successIcon.classList.add('hidden');
                $defaultTooltipMessage.classList.remove('hidden');
                $successTooltipMessage.classList.add('hidden');
                tooltip.hide();
            }
        });
    </script>
</body>

</html>
