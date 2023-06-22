<button onclick="showPopup()">Open Input Popup</button>

  <div id="popupOverlay" class="overlay">
    <div class="popup">
      <div class="close-btn">
        <button onclick="hidePopup()">&times;</button>
      </div>
      <div class="input-container">
        <label for="name">Name:</label>
        <input type="text" id="name">
      </div>
      <div class="input-container">
        <label for="email">Email:</label>
        <input type="email" id="email">
      </div>
      <div class="input-container">
        <button onclick="submitForm()">Submit</button>
      </div>
    </div>