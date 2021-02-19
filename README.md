#Web Hosting Canada - Developer Test

Create a web app consisting of a text field and a submit button. The user enters a value 
in the text field in this format "command arg1 arg2 arg3 ... argN" and press the 
submit button in order to see the result.


Implement these commands:
* add:       adds numeric arguments.
* sort-asc:  sort arguments in ascending order.
* repo-desc: perform a GitHub API call using owner and repo arguments to return a 
             description of the repository.


For example, the user submits "add 5 10 20 40" and a result of 75 is returned.


The app should:
* use object-oriented PHP 7
* validate the input
* be secure
* permit addition of new commands (like subtract) without disturbing existing code
* use ajax to return results (no page reloads)

