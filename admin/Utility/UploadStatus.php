<?php

/**
 * @author Zahiriddin Rustamov
 */
abstract class UploadStatus
{
    const SUCCESSFUL = 0;
    const FILE_EXISTS = 1;
    const FILE_EXCEEDS_LIMIT = 2;
    const FILE_NOT_IMAGE = 3;
    const FILE_NOT_SAVED = 4;
    const ERROR = 5;
}
