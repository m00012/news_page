<div class="container">
    <h2>Contact Us</h2>
    
    <div id="msg"></div>

    <form id="contactForm" autocomplete="on">
		<label for="name"></label>
        <input id="name" name="name" type="text" maxlength="64" placeholder="Enter your name"><br>

        <label for="remail1"></label>
        <input id="remail1" name="remail1" type="text" maxlength="64" placeholder="Enter your email"><br>

        <label for="remail2"></label>
        <input id="remail2" name="remail2" type="text" maxlength="64" placeholder="Re-Enter your email"><br>

        <label for="subject"></label>
        <input id="subject" name="subject" type="text" maxlength="64" placeholder="Subject"><br>
        
        <div class="form-group">
            Message: <span id="chars">0</span> of 1000 characters maximum
        </div>
        <div class="form-group">
            <textarea class="form-control" id="message" name="message" placeholder="Message" rows="10" maxlength="1000"></textarea>
        </div>

        <div class="buttons">
            <button id="send" type="submit">Send</button>&nbsp;&nbsp;&nbsp;
        	<button id="clear" type="button">Clear</button>
        </div>
    </form>
    
 </div>