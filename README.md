# EmailAttachments
Email attachment extension for Magento 2.3.x

## Installation
#### - Form composer
* composer require robertrupa/email-attachments
#### - Copy/clone files
 * Download or copy files to app\code\RobertRupa\EmailAttachments
 
 
## Usage
Example for contact form:
Make preference for Magento\Contact\Model\Mail
<code>

    $file_path = 'media/directory/file.jpg'; 
    $fileName = 'file.jpg';
    $transport = $this->transportBuilder
        ->setTemplateIdentifier($this->contactsConfig->emailTemplate())
        ->setTemplateOptions(
            [
                'area' => Area::AREA_FRONTEND,
                'store' => $this->storeManager->getStore()->getId()
            ]
         )
         ->setTemplateVars($variables)
         ->setFrom($this->contactsConfig->emailSender())
         ->addTo($this->contactsConfig->emailRecipient())
         ->addAttachment($file_path, $fileName)
         ->setReplyTo($replyTo, $replyToName)
         ->getTransport();
    $transport->sendMessage();
</code>
