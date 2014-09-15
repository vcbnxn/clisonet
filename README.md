#clisonet - A commandline PHP social network demo.

This readme is a brief overview with details of running the the project, the code is extensively commented should you require further information.

The code is commented using both inline commands Javadoc style block comments that can be beautified by a tool such as phpDocumentor.

## Design
The program is designed using an Model-View-Controller approach. This was chosen because it is a popular means of separating conerns in such systems - aspects such as the model can be easily replaced with equivalents that work from SQL or other data stores. The Controller can easily be replaced with one that handles HTTP requests rather than strings, etc.

View - takes input and passes it to the relevant controller, presenting responses to the end-user appropriately.
Controller - interacts with the Models to retrieve appropriate/submit data for to match user requests.
Model - provides an abstract interface to data.

This is advantageous for a large system such as a social network where it may be necessary to distribute the data for scalability.

### Development Decisions
We used test driven development (TDD), that is, a test case for each class was developed prior to the implementation of the class. This requires certainty in the classes' interfaces, so the application was built by first develpoment the "Model", then the "Controller" and lastly the "View".

### File Structure/Conventions
```
-src/
  |-autoload.php
  |-clisonet.php
  |-controllers/
	`-AbstractController.php
  |-model/
    |- AbstractManager.php
	`-AbstractModel.php
  `-views/
	`-AbstractView.php
-tests/
```

`clisonet.php` is the main entry point for the program. It should be replaced with whatever is suitable for changing the behaviour of the program, such as `httpsonet.php`. It is a plain PHP scrip that instantiates appropriate classes and calls `autoload.php` - a file used by the main application and the tests to manage the loading of various classes.

The abstract classes are used to define and priovde basic functionality for each class type.

## Requirements
The program was written and tested on Crunchbang Waldorf, the default repositories and package manager was used, though any typical setup should work.

You'll need an up-to-date version (>= 5.3.3) of PHP installed, with the binary available from your $PATH. As long as you have that, you should be able to run the main application without issue. Waldorf is currently using PHP 5.4.4-14+deb7u14 which features long-term security support:

	
	$ sudo apt-get install php5-common php5-cli
	

To run the included unit tests you'll also need PHPUnit. The best way is to use a Phar file, briefly:

	
	$ wget https://phar.phpunit.de/phpunit.phar
	$ chmod +x phpunit.phar
	$ sudo mv phpunit.phar /usr/local/bin/phpunit
	$ phpunit --version
	

If necessary, you can find further instructions for PHPUnit install here: https://phpunit.de/manual/current/en/installation.html

If you intend to work with git to pull the code, you'll also need to make sure you have that install:

	
	$ sudo apt-get install git
	
	
You can also download the code over the web straight form github.
	
## Running
Clone the repository from github, then call `clisonet.php`:

	
	$ git clone https://github.com/vcbnxn/clisonet.git
	$ cd src/
	$ ./clisonet.php
	

### Using the social network

Each command is entered by the user in the following format:

	
	> USERNAME COMMAND PARAMS...
	

There are four basic commands:
 * Posting e.g. Alice changes her status  `>Alice -> hello, how are you`
 * Reading e.g. Reading Bob's timeline: `> Bob` 
 * Following e.g. Alice follows Bob: `Alice follows Bob`
 * Wall e.g. Alice views her wall: `Alice wall`

When you first start the program you will be invited to create a new user, if you wish to create users later on, use the command `NEWUSER`, if you wish to switch users afterwards, use the command `SWITCHUSER`.
 
If you need help with a command, type `help COMMAND` e.g. `> help posting`. Entering 'HELP' alone will display a list of all commands.

### Wall vs timeline
The wall is timeline to be all status updates made by a user.
The timeline is messages and status updates by and to a user.

### Tests
Each class has an appropriate collection of unit tests for the public member functions. They can be run altogether using the following command:

	
	$ phpunit --bootstrap src/autoload.php tests
	
	
To run a specific class, modify the following example for the User class:

	
	$ phpunit --bootstrap src/autoload.php UserTest
	