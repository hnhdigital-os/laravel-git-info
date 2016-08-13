<?php

namespace Bluora\GitVersion;

class GitVersion
{
    /**
     * Run a GIT command.
     *
     * @param  string $command
     * @return string
     */
    private function git($command)
    {
        $dir = getcwd();
        chdir(base_path());
        $output = shell_exec('git '.$command);
        chdir($dir);
        return trim($output);
    }

    /**
     * Get the current branch.
     * 
     * @return string
     */
    public function getBranch()
    {
        return $this->git('symbolic-ref --short HEAD');
    }

    /**
     * Get the current version.
     * 
     * @return string
     */
    public function getVersion()
    {
        return $this->git('describe --always --tags --dirty');
    }
}
