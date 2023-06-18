<?php
/**
 * @copyright Yusup Hambali
 * @license MIT
 */
namespace yusham\resend;

use Yii;

class Message extends \yii\mail\BaseMessage
{
    private $from, $tos = [];
    private $text, $html;
    private $subject;
    private $attachments = [];

    public function getFrom()
    {
        return $this->from;
    }

    public function setFrom($from): self
    {
        $this->from = $from;
        return $this;
    }

    public function getTo()
    {
        return $this->tos;
    }

    public function setTo($to): self
    {
        $this->tos[] = $to;
        return $this;
    }

    public function getSubject(): string
    {
        return (string) $this->subject;
    }

    public function setSubject($subject): self
    {
        $this->subject = $subject;
        return $this;
    }

    public function setTextBody($text): self
    {
        $this->text = $text;
        return $this;
    }

    public function setHtmlBody($html): self
    {
        $this->html = $html;
        return $this;
    }

    public function getHtmlBody()
    {
        return $this->html;
    }

    public function getCharset()
    {
        throw new \RuntimeException(__METHOD__ .' Not implemented');
    }

    public function setCharset($charset)
    {
        throw new \RuntimeException(__METHOD__ .' Not implemented');
    }

    public function getReplyTo()
    {
        throw new \RuntimeException(__METHOD__ .' Not implemented');
    }

    public function setReplyTo($replyTo)
    {
        throw new \RuntimeException(__METHOD__ .' Not implemented');
    }

    public function getCc()
    {
        throw new \RuntimeException(__METHOD__ .' Not implemented');
    }

    public function setCc($cc)
    {
        throw new \RuntimeException(__METHOD__ .' Not implemented');
    }

    public function getBcc()
    {
        throw new \RuntimeException(__METHOD__ .' Not implemented');
    }

    public function setBcc($bcc)
    {
        throw new \RuntimeException(__METHOD__ .' Not implemented');
    }

    public function attach($fileName, array $options = []): self
    {
        $options['file'] = Yii::getAlias($fileName);
        $this->attachments[] = $options;
        return $this;
    }

    public function attachContent($content, array $options = []): self
    {
        $options['content'] = $content;
        $this->attachments[] = $options;
        return $this;
    }

    public function getAttachments()
    {
        return $this->attachments;
    }

    public function embed($fileName, array $options = []): string
    {
        throw new \RuntimeException(__METHOD__ .' Not implemented');
    }

    public function embedContent($content, array $options = []): string
    {
        throw new \RuntimeException(__METHOD__ .' Not implemented');
    }

    public function toString()
    {
        return '';
    }
}