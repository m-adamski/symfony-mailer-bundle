# Mailer Bundle for Symfony

The package unifies the class nomenclature and adds new functionality to the existing SwiftMailer library. 
Using it, creating messages is more convenient and faster.

This bundle is compatible with Symfony 4.1 and Symfony 5.0. Symfony 3.4 compatibility abandoned.

## Installation

This bundle can be installed by Composer:

```
$ composer require m-adamski/symfony-mailer-bundle
```

## How to use it?

The helper contains an additional function to create a message instance. 
With its help, you can also render the message content from the Twig template.

| Method         | Description                                                                                                                  |
| -------------- | ---------------------------------------------------------------------------------------------------------------------------- |
| buildMessage   | The function returns a message instance. It is possible to overwrite the class parameters later.                             |
| renderTemplate | The function renders the message content from the given Twig template.                                                       |
| sendMessage    | The function sends a previously prepared message. The return value is the number of recipients to whom the message was sent. |

To simplify the creation of HTML messages, a function has been prepared in the ``MailerMessage`` class that automatically defines the message as ``text/html``.

| Method      | Description                                                       |
| ----------- | ----------------------------------------------------------------- |
| setHTMLBody | The function sets the class parameters to get a text/html message |

## License

MIT
