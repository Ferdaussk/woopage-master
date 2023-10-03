document.addEventListener('DOMContentLoaded', function() {
  const buttons = document.querySelectorAll('.install-button');
  let lastInstalledSection = '';

  // Initialize button states based on the lastInstalledSection value
  buttons.forEach(button => {
      const sectionId = button.parentNode.id;
      const installText = button.querySelector('.install-text');
      const uninstallText = button.querySelector('.uninstall-text');

      if (sectionId === lastInstalledSection) {
          installText.style.display = 'none';
          uninstallText.style.display = 'inline';
          button.setAttribute('data-installed', 'true');
      } else {
          installText.style.display = 'inline';
          uninstallText.style.display = 'none';
          button.setAttribute('data-installed', 'false');
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
                  // Reset all other buttons to the install state
                  buttons.forEach(otherButton => {
                      const otherInstallText = otherButton.querySelector('.install-text');
                      const otherUninstallText = otherButton.querySelector('.uninstall-text');
                      otherInstallText.style.display = 'inline';
                      otherUninstallText.style.display = 'none';
                      otherButton.setAttribute('data-installed', 'false');
                  });

                  installText.style.display = 'none';
                  uninstallText.style.display = 'inline';
                  button.setAttribute('data-installed', 'true');
                  lastInstalledSection = sectionId;
              }

              button.disabled = false;
              loadingIcon.style.display = 'none';

              // Save the last-installed-section value via AJAX
              jQuery.post(ajaxurl, {
                  action: 'update_last_installed_section',
                  last_installed_section: lastInstalledSection
              });
          }, 3000);
      });
  });
});
