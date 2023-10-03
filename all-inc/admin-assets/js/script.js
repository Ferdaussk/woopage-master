// This for tab
// function selectTab(tabIndex) {
//     //Hide All Tabs
//     document.getElementById('tab1Content').style.display="none";
//     document.getElementById('tab2Content').style.display="none";
//     document.getElementById('tab3Content').style.display="none";
//     document.getElementById('tab4Content').style.display="none";
//     //Show the Selected Tab
//     document.getElementById('tab' + tabIndex + 'Content').style.display="block";  
// }

// // This for active button
// const admin_tab1btn = document.getElementById('tab1');
// const admin_tab2btn = document.getElementById('tab2');
// const admin_tab3btn = document.getElementById('tab3');
// const admin_tab4btn = document.getElementById('tab4');
// function changeBackground(event){
//   const active = document.querySelector('.productsarchive_active');
//   if(active){
//     active.classList.remove('productsarchive_active')
//   }
//   event.target.className = "productsarchive_active";
// }
// admin_tab1btn.addEventListener('click', changeBackground.bind(this));
// admin_tab2btn.addEventListener('click', changeBackground.bind(this));
// admin_tab3btn.addEventListener('click', changeBackground.bind(this));
// admin_tab4btn.addEventListener('click', changeBackground.bind(this));




// This is for dashboard accordion (New js)
    const tabDButtons = document.querySelectorAll('.tab-btn');
    const tabAContents = document.querySelectorAll('.tab-content');
  
    tabDButtons.forEach((button, index) => {
      button.addEventListener('click', () => {
        tabDButtons.forEach(btn => {
          btn.classList.remove('active');
        });
  
        tabAContents.forEach(content => {
          content.style.display = 'none';
        });
  
        button.classList.add('active');
        tabAContents[index].style.display = 'block';
      });
    });
  
    // Show the first tab content by default
    tabDButtons[0].click();

// This is for dashboard tab (New js)
  const tabButtons = document.querySelectorAll('.tab-btn');
  const tabContents = document.querySelectorAll('.tab-content');

  tabButtons.forEach((button, index) => {
    button.addEventListener('click', () => {
      tabButtons.forEach(btn => {
        btn.classList.remove('active');
      });

      tabContents.forEach(content => {
        content.style.display = 'none';
      });

      button.classList.add('active');
      tabContents[index].style.display = 'block';
    });
  });

  // Show the first tab content by default
  tabButtons[0].click();

  // Accordion functionality for tab1Content
  const acc1Items = document.querySelectorAll('.productsarchive_acc1_view1, .productsarchive_acc1_view2');
  acc1Items.forEach(item => {
    item.addEventListener('click', () => {
      acc1Items.forEach(accItem => {
        if (accItem !== item) {
          accItem.classList.remove('active');
        }
      });

      item.classList.toggle('active');
    });
  });

  // Accordion functionality for tab2Content
  const acc2Items = document.querySelectorAll('.productsarchive_acc2_view1, .productsarchive_acc2_view2, .productsarchive_acc2_view3');
  acc2Items.forEach(item => {
    item.addEventListener('click', () => {
      acc2Items.forEach(accItem => {
        if (accItem !== item) {
          accItem.classList.remove('active');
        }
      });

      item.classList.toggle('active');
    });
  });
