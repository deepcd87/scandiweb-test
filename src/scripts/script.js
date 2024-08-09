function showProductSpecs() {
  const listLength = document.querySelectorAll("#productType option").length;
  const selectedId = document.querySelector("option:checked").value;
  const selectedName = document.querySelectorAll("#productType > option")[
    selectedId
  ].innerText;

  for (let i = 1; i < listLength; i++) {
    name = document.querySelectorAll("#productType > option")[i].innerText;
    id = document.querySelectorAll("#productType > option")[i].value;

    if (name !== selectedName) {
      document.getElementById(name).style.display = "none";

      // remove 'required' attribute from selected category fields
      let inputRequiredCount = document.querySelectorAll(
        `#${name} > input`
      ).length;
      let inputRequired = document.querySelectorAll(`#${name} > input`);
      for (let c = 0; c < inputRequiredCount; c++) {
        requiredId = document.querySelectorAll(`#${name} > input`)[c].id;
        document.getElementById(requiredId).removeAttribute("required");
      }
    } else {
      document.getElementById(name).style.display = "block";

      // set 'required' attribute to selected category fields
      let inputRequiredCount = document.querySelectorAll(
        `#${name} > input`
      ).length;
      let inputRequired = document.querySelectorAll(`#${name} > input`);
      for (let c = 0; c < inputRequiredCount; c++) {
        requiredId = document.querySelectorAll(`#${name} > input`)[c].id;
        document.getElementById(requiredId).setAttribute("required", "");
      }
    }
  }
}

function formSubmit(formId) {
  return document.getElementById(formId).submit();
}

function formVerify() {
  let messageBox = document.querySelector(".message-text");
  messageBox.innerHTML = "";
  const formList = document.querySelectorAll("form input, select");

  for (let i = 0; i < formList.length; i++) {
    fieldName = formList[i].getAttribute("inputname");

    if (formList[i].required && (formList[i].value == "")) {
      messageBox.innerHTML = 
      `
      <div class="message-error">
      <p>Please fill in the "${formList[i].getAttribute("inputname")}" field </p></div>
      `;
      formList[i].focus();
      return;

    } else if (formList[i].required
            && formList[i].type == 'number'
            && formList[i].value < 0) {
      messageBox.innerHTML = 
      `
      <div class="message-error"><p>${fieldName} field can't be negative number</p></div>
      `;
      formList[i].focus();
      return;      

    } else if (formList[i].required && 
               (formList[i].type == 'select-one') && 
               (formList[i].value == "0") ) {
      messageBox.innerHTML = 
      `
      <div class="message-error"><p>Please choose 'Product category'</p></div>
      `;
      formList[i].focus();
      return;
    }
  }
  // Submiting form
  formSubmit("product_form");
  // function end
}

function formSortSelect() {
  const UrlSortValue = new URLSearchParams(window.location.search).get("sort");
  if (UrlSortValue !== null) {
    const sortList = document.querySelectorAll("#selectSort > option");

    for (let i = 0; i < sortList.length; i++) {
      sortListId = sortList[i].value;

      if (sortListId == UrlSortValue) {
        sortList[i].setAttribute("selected", "");
      }
    }
  }
  // function end
}

formSortSelect();
