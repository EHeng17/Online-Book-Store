const email_pw = document.getElementById('email_pw'); /* Get html tag that has the id="email_pw" */
const personal_details = document.getElementById('personal_details'); /* Get html tag that has the id="personal_details" */
const container = document.getElementById('container'); /* Get html tag that has the id="container" */

email_pw.addEventListener('click', () => {
	container.classList.add("right-panel-active"); /* If const email_pw is clicked, add class="right-panel-active" into the current class */
});

personal_details.addEventListener('click', () => {
	container.classList.remove("right-panel-active"); /* If const personal_details is clicked, remove class="right-panel-active" from the current class */
});

/*
REFERENCE


Traversy Media (2019, April 18). Sliding Sign In & Sign Up Form. YouTube
    https://www.youtube.com/watch?v=mUdo6w87rh4
    
*/
