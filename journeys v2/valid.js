function validation() {
  let form = document.getElementById('form')
  let email = document.getElementById('em').value
  let text = document.getElementById('text')

  if (email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
    form.classList.add('valid')
    form.classList.remove('invalid')
    return true;
  }

  else {
    form.classList.remove('valid')
    form.classList.add('invalid')
    text.innerHTML = "Invalid email entered."
    text.style.color = '#ff0000'
    return false
  }
}

function regvalidation() {
  let form = document.getElementById('form')
  let email = document.getElementById('em').value
  let text2 = document.getElementById('text2')
  let text3 = document.getElementById('text3')
  let phone = document.getElementById('ph').value
  let dob = document.getElementById('dob').value

  let flag1 = 99
  let flag2 = 99
  let flag3 = 99

  if (email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
    form.classList.add('valid')
    form.classList.remove('invalid')
    document.getElementById('em').style.backgroundColor = "#eeeeee"
    flag1 = 0
  }

  else {
    form.classList.add('invalid')
    form.classList.remove('valid')
    document.getElementById('em').style.backgroundColor = "#fc5151"
    text2.innerHTML = "Email address (Invalid Email)"
    text2.style.color = '#ff0000'
    flag1 = 1
  }

  if (phone.match(/^[0-9]{10}$/)) {
    form.classList.add('valid')
    form.classList.remove('invalid')
    document.getElementById('ph').style.backgroundColor = "#eeeeee"
    flag2 = 0
  }
  else {
    form.classList.add('invalid')
    form.classList.remove('valid')
    document.getElementById('ph').style.backgroundColor = "#fc5151"
    text3.innerHTML = "Phone Number (Must be 10 digits long)"
    text3.style.color = '#ff0000'
    flag2 = 1
  }

  if (flag1 == 0 && flag2 == 0) {
    return true;
  }

  else {
    return false;
  }
}

function cardvalid() {
  const date = new Date()
  let month = date.getMonth() + 1
  let year = date.getFullYear()
  let form = document.getElementById('form')
  let cardno1 = document.getElementById('cardno1').value
  let cardno2 = document.getElementById('cardno2').value
  let cardno3 = document.getElementById('cardno3').value
  let cardno4 = document.getElementById('cardno4').value
  let expM = document.getElementById('expM').value
  let expY = document.getElementById('expY').value
  let email = cardno1 + cardno2 + cardno3 + cardno4
  console.log(email)
  let text = document.getElementById('text')
  let text2 = document.getElementById('text2')
  let mastercard = /^5[1-5][0-9]{14}|^(222[1-9]|22[3-9]\\d|2[3-6]\\d{2}|27[0-1]\\d|2720)[0-9]{12}$/
  let visa = /^4[0-9]{12}(?:[0-9]{3})?$/
  let rupay = /^6(?!011)(?:0[0-9]{14}|52[12][0-9]{12})$/
  let card = 99
  let exp = 99

  if (email.match(mastercard)) {
    form.classList.add('valid')
    form.classList.remove('invalid')
    text.innerHTML = "Valid MasterCard entered."
    text.style.color = '#00ff00'
    card = 0

  }
  else if (email.match(visa)) {
    form.classList.add('valid')
    form.classList.remove('invalid')
    text.innerHTML = "Valid Visa card entered."
    text.style.color = '#00ff00'
    card = 0
  }
  else if (email.match(rupay)) {
    form.classList.add('valid')
    form.classList.remove('invalid')
    text.innerHTML = "Valid RuPay card entered."
    text.style.color = '#00ff00'
    card = 0
  }
  else if (email == '') {
    form.classList.remove('valid')
    form.classList.remove('invalid')
    text.innerHTML = ""
    text.style.color = '#00ff00'
    card = 1
  }
  else {
    form.classList.remove('valid')
    form.classList.add('invalid')
    text.innerHTML = "Invalid card number."
    text.style.color = '#ff0000'
    card = 1
  }

  if (expY == year && expM > month) {
    form.classList.add('valid')
    form.classList.remove('invalid')
    text2.innerHTML = "Expiry validated."
    text2.style.color = '#00ff00'
    exp = 0
  }
  else if (expY > year) {
    form.classList.add('valid')
    form.classList.remove('invalid')
    text2.innerHTML = "Expiry validated."
    text2.style.color = '#00ff00'
    exp = 0
  }
  else if (expY < year) {
    form.classList.add('invalid')
    form.classList.remove('valid')
    text2.innerHTML = "Card has expired."
    text2.style.color = '#ff0000'
    exp = 1
  }

  if (card == 0 && exp == 0) {
    return true
  }

  else {
    return false
  }

}

function finalvalidation() {
  let formday = String(document.getElementById("fDD").value).padStart(2, '0')
  let formmonth = String(document.getElementById("fMM").value).padStart(2, '0')
  let formyear = String(document.getElementById("fYY").value)
  let today = String(document.getElementById("tDD").value).padStart(2, '0')
  let tomonth = String(document.getElementById("tMM").value).padStart(2, '0')
  let toyear = String(document.getElementById("tYY").value)

  var d1 = new Date(formyear + '-' + formmonth + '-' + formday)
  var d2 = new Date(toyear + '-' + tomonth + '-' + today)
  var d3 = new Date()
  if (d1 <= d2) {
    if (d2 >= d3 && d1 >= d3) {
      if (document.getElementById('t1').checked || document.getElementById('t2').checked || document.getElementById('t3').checked) {
        if (document.getElementById('pickup').value == "") {
          document.getElementById('pickup').style.backgroundColor = "#fc5151"
          document.getElementById('pickup').style.color = "white"
          document.getElementById('pickup').placeholder = ""
          return false
        }

        else {
          document.getElementById('pickup').style.backgroundColor = "#eeeeee"
          document.getElementById('pickup').style.color = "#28284f"
          return true
        }
      }
      else {
        document.getElementById('pickup').style.backgroundColor = "#eeeeee"
        document.getElementById('pickup').style.color = "#28284f"
        return true
      }
    }
    else {
      document.getElementById('fDD').style.backgroundColor = "#fc5151"
      document.getElementById('fMM').style.backgroundColor = "#fc5151"
      document.getElementById('fYY').style.backgroundColor = "#fc5151"
      document.getElementById('tDD').style.backgroundColor = "#fc5151"
      document.getElementById('tMM').style.backgroundColor = "#fc5151"
      document.getElementById('tYY').style.backgroundColor = "#fc5151"
      document.getElementById('fDD').style.color = "white"
      document.getElementById('fMM').style.color = "white"
      document.getElementById('fYY').style.color = "white"
      document.getElementById('tDD').style.color = "white"
      document.getElementById('tMM').style.color = "white"
      document.getElementById('tYY').style.color = "white"
      return false
    }
  }
  else {
    document.getElementById('tDD').style.backgroundColor = "#fc5151"
    document.getElementById('tMM').style.backgroundColor = "#fc5151"
    document.getElementById('tYY').style.backgroundColor = "#fc5151"
    document.getElementById('tDD').style.color = "white"
    document.getElementById('tMM').style.color = "white"
    document.getElementById('tYY').style.color = "white"
    return false
  }
}
