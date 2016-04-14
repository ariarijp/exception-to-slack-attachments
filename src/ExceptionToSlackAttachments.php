<?php

namespace ExceptionToSlackAttachments;

class ExceptionToSlackAttachments
{
    /**
     * @param \Exception $e
     * @return array
     */
    public static function toAttachments(\Exception $e)
    {
        $title = sprintf('%s: %s in %s:%d', get_class($e), $e->getMessage(), $e->getFile(), $e->getLine());

        return [
            'title' => $title,
            'fallback' => $title,
            'as_user' => false,
            'color' => 'danger',
            'fields' => [
                ['title' => 'Exception', 'value' => get_class($e)],
                ['title' => 'Message', 'value' => $e->getMessage()],
                ['title' => 'File', 'value' => $e->getFile()],
                ['title' => 'Line', 'value' => $e->getLine()],
                ['title' => 'Code', 'value' => $e->getCode()],
                ['title' => 'Trace String', 'value' => $e->getTraceAsString()],
            ],
        ];
    }
}
