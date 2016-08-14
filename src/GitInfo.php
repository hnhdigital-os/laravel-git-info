<?php

namespace Bluora\GitInfo;

class GitInfo
{
    /**
     * Run a GIT command.
     *
     * @param string $command
     *
     * @return string
     */
    private function git($command)
    {
        $dir = getcwd();
        chdir(base_path());
        $output = shell_exec(env('GIT_INFO_PATH', 'git').' '.$command);
        chdir($dir);

        return trim($output);
    }

    /**
     * Get the current branch.
     *
     * @return string
     */
    public function branch()
    {
        return $this->git('symbolic-ref --short HEAD');
    }

    /**
     * Get total commits.
     *
     * @return string
     */
    public function commits()
    {
        return $this->git('rev-list HEAD --count');
    }

    /**
     * Get total commits behind a given branch.
     *
     * @return string
     */
    public function commitsBehind($branch = 'master', $return_text = true)
    {
        if ($this->branch() == $branch) {
            return ($return_text) ? '' : 0;
        }
        $current_count = $this->commits();
        $branch_count = $this->git('rev-list '.$branch.' --count');
        $diff_count = $current_count - $branch_count;
        if ($current_count > $branch_count) {
            return ($return_text) ? $diff_count.' commits ahead of '.$branch : $diff_count;
        } elseif ($branch_count > $current_count) {
            return ($return_text) ? abs($diff_count).' commits behind of '.$branch : abs($diff_count);
        }

        return 0;
    }

    /**
     * Get the current version.
     *
     * @return string
     */
    public function version()
    {
        return $this->git('describe --always --tags --dirty');
    }
}
