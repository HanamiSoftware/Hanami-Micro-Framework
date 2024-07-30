# Hanami Foundation Library
I thought about this library to make the developer's life a little bit easier with all the libraries they may need during the development stage of a website or web application.
# Libraries you can find here
1. Doctrine for database
2. Paypal for payments and subsciptions
3. Auth via JWT for authentication
4. Mailer via PhpMailer
5. Config via .env file

# How to use the Library
first thing first copy and paste the .env.example file in your root directory
put all the username, password, email address or any other key inside the file

... Just use it

# Do you want to Add some more?

## follow our Conventions
### Hanami Software Coding Conventions

Hanami Software adopts the following coding conventions to ensure consistency, readability, and maintainability of code. The conventions are based on PSR-4 and adhere to classical PHP standards.

#### 1. **Namespace**
The namespace must follow the directory structure starting with the `src/` directory. The root namespace is `Hanami`.

Example of folder structure:
```
src/
|-- Models/
| | |-- UserModel.php
|-- Interfaces/
| | |-- DatabaseInterface.php
```

Example namespace:
```php
namespace Hanami\Models;
```

#### 2. **Autoloading**
The project uses PSR-4 for autoloading. The Composer configuration for autoloading will be:

`composer.json`:
```json
{
    "autoload": {
            "psr-4": {
              "Hanami\\": "src/"
            }
    }
}
```

#### 3. **Class Names**
Class names must be in PascalCase (each word starts with an uppercase letter, no separating characters).

Example:
```php
class UserModel
{
    // Contents of the class.
}
```

#### 4. **Names of Interfaces**
Interface names must end with the word “Interface” and follow the PascalCase convention.

Example:
```php
/**
 * A short description.
 * @param if any params
 * @return always describe the return type expected.
 */
interface DatabaseInterface
{
    public function connect():bool|databaseInstance;
    public function query($sql):string;
}
```

#### 5. **Method Names**
Method names must be in camelCase (first word is lowercase, subsequent words begin with an uppercase letter).

Example:
```php
public function getUserName()
{
    // Method content
}
```

#### 6. **Variable Names**
Variable names must be in camelCase.

Example:
```php
$userName = “John Doe”;
```

### Code Examples.

#### 1. **Class Example: UserModel**

```php
<?php

namespace Hanami\Models;

class UserModel
{
    private $id;
    private $userName;
    private $email;

    public function __construct($id, $userName, $email)
    {
        $this->id = $id;
        $this->userName = $userName;
        $this->email = $email;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
}
```

#### 2. **Example Interface: DatabaseInterface**

```php
<?php

namespace Hanami\Interfaces;

interface DatabaseInterface
{
    public function connect();
    public function query($sql);
}
```

### General Rules.

1. **Indentation**: Use 4 spaces for indentation. Do not use tabs.
2. **Line Length**: Try to keep code lines within 80 characters. Use line breaks if necessary.
3. **Comments**: Use comments to explain complex or important code. Use block comments (`/** */`) for class and method documentation.

Example of block comment:
```php
/**
* This class represents a user in the system.
*/
class UserModel
{
    /**
 * A short description.
 * @param if any params
 * @return always describe the return type expected.
 */
    public function getId()
    {
        return $this->id;
    }
}
