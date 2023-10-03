// Function to set button text based on data-installed attribute
function setButtonText(button) {
    const isInstalled = button.getAttribute('data-installed') === 'true';
    const installText = button.querySelector('.install-text');
    const uninstallText = button.querySelector('.uninstall-text');

    if (isInstalled) {
        installText.style.display = 'none';
        uninstallText.style.display = 'inline';
    } else {
        uninstallText.style.display = 'none';
        installText.style.display = 'inline';
    }
}

// Call setButtonText for each button on page load
document.addEventListener('DOMContentLoaded', function() {
const buttons = document.querySelectorAll('.install-button');
let lastInstalledSection = LastInSave;

buttons.forEach(button => {
const sectionId = button.parentNode.id;
const installText = button.querySelector('.install-text');
const uninstallText = button.querySelector('.uninstall-text');

if (sectionId === lastInstalledSection) {
  installText.style.display = 'none';
  uninstallText.style.display = 'inline';
} else {
  installText.style.display = 'inline';
  uninstallText.style.display = 'none';
}

button.addEventListener('click', function() {
    const loadingIcon = button.querySelector('.loading-icon');

    if (!loadingIcon.style.display) {
        loadingIcon.style.display = 'none';
    }

    button.disabled = true;
    loadingIcon.style.display = 'inline';

    setTimeout(function () {
        if (sectionId === lastInstalledSection) {
            installText.style.display = 'inline';
            uninstallText.style.display = 'none';
            button.setAttribute('data-installed', 'false');
            lastInstalledSection = '';
        } else {
            installText.style.display = 'none';
            uninstallText.style.display = 'inline';
            button.setAttribute('data-installed', 'true');
            lastInstalledSection = sectionId;
        }

        button.disabled = false;
        loadingIcon.style.display = 'none';

        const lastInstalledSectionElement = document.getElementById('last-installed-section');
        lastInstalledSectionElement.textContent = 'Successfully Installed: '+lastInstalledSection
        // Save the last-installed-section value via AJAX
        jQuery.post(ajaxurl, {
            action: 'update_last_installed_section',
            last_installed_section: lastInstalledSection
        });
    }, 3000);
});
});
});


let isLoading = false;
let lastInstalledSection = null;
let lastClickedButton = null;

function simulateLoading(button) {
    if (isLoading) return;

    if (lastClickedButton !== null && lastClickedButton !== button) {
        resetButtonState(lastClickedButton);
    }

    isLoading = true;
    button.disabled = true;
    button.classList.add('loading');

    const loadingIcon = button.querySelector('.loading-icon');
    loadingIcon.style.display = 'block';

    setTimeout(function () {
        isLoading = false;
        button.classList.remove('loading');
        loadingIcon.style.display = 'none';

        const isInstalled = button.getAttribute('data-installed') === 'true';

        if (!isInstalled) {
            button.setAttribute('data-installed', 'true');
            lastInstalledSection = button.parentNode.id;
        } else {
            button.setAttribute('data-installed', 'false');
            lastInstalledSection = null;
        }

        setButtonText(button);

        updateInstalledSections();
        lastClickedButton = button;
        button.disabled = false;
    }, 3000);
}

function updateInstalledSections() {
  const lastInstalledSectionElement = document.getElementById('last-installed-section');
  lastInstalledSectionElement.textContent = lastInstalledSection ? `${lastInstalledSection}` : '';
}

// added for save start
function updateInstalledSections() {
  const lastInstalledSectionElement = document.getElementById('last-installed-section');
  lastInstalledSectionElement.textContent = lastInstalledSection ? `${lastInstalledSection}` : '';

    // Update the last-installed-section value in WordPress options
    jQuery.post(ajaxurl, {
        action: 'update_last_installed_section',
        last_installed_section: lastInstalledSection
    });
}
// added for save end

function resetButtonState(button) {
    if (button) {
        button.removeAttribute('data-installed');
        setButtonText(button);
    }
}



/* Styles for the popup overlay */
// Get references to the popup elements
const popupButton = document.querySelector('.popup-button');
const popupOverlay = document.getElementById('popupOverlay');
const closePopupButton = document.getElementById('closePopup');
const loadingIcon = document.getElementById('loadingIcon');
const actualContent = document.getElementById('actualContent');

// Function to open the popup
popupButton.addEventListener('click', () => {
    popupOverlay.style.display = 'flex';
    loadingIcon.style.display = 'block';
    actualContent.style.display = 'none';

    setTimeout(() => {
        loadingIcon.style.display = 'none';
        actualContent.style.display = 'block';
    }, 1500);
});

// Function to close the popup
function closePopup() {
    popupOverlay.style.display = 'none';
}

closePopupButton.addEventListener('click', closePopup);

// Close the popup when clicking anywhere on the body
document.body.addEventListener('click', (event) => {
    if (event.target === popupOverlay) {
        closePopup();
    }
});