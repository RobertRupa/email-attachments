<?php


namespace RobertRupa\EmailAttachments\Mail\Template;

use Magento\Framework\Exception\LocalizedException;
use RobertRupa\EmailAttachments\Mail\Message;

class TransportBuilder extends \Magento\Framework\Mail\Template\TransportBuilder
{
    /**
     * @var Message
     */
    protected $message;

    /**
     * Add an attachment to the message.
     *
     * @param string $filePath
     * @param string $fileName
     * @return $this
     */
    public function addAttachment($filePath, $fileName)
    {
        if (!empty($filePath) && file_exists($filePath)) {
            $content = file_get_contents($filePath);
            $fileType = filetype($filePath);
            $this->message->setBodyAttachment($content, $fileName, $fileType);
        }
        return $this;
    }
    /**
     * After all parts are set, add them to message body.
     *
     * @return $this
     * @throws LocalizedException
     */
    protected function prepareMessage()
    {
        parent::prepareMessage();
        $this->message->setPartsToBody();
        return $this;
    }

}