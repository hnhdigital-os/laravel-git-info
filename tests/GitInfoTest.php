<?php

namespace Bluora\LaravelGitInfo\Tests;

use Bluora\LaravelGitInfo\GitInfo;
use PHPUnit\Framework\TestCase;

class GitInfoTest extends TestCase
{
    /**
     * Assert the branch returns correctly.
     */
    public function testBranch()
    {
        $git = new GitInfo();
        $this->assertEquals($git->branch(), 'master');
    }

    /**
     * Assert the total commits returns correctly.
     */
    public function testCommits()
    {
        $git = new GitInfo();
        $commits = trim(shell_exec('git rev-list HEAD --count'));
        $this->assertEquals($git->commits(), $commits);
    }

    /**
     * Assert the total commits behind returns correctly.
     */
    public function testCommitsBehind()
    {
        $git = new GitInfo();
        $this->assertEquals($git->commitsBehind(), '');
        $this->assertEquals($git->commitsBehind('master', false), 0);
    }

    /**
     * Assert the version returns correctly.
     */
    public function testVersion()
    {
        $git = new GitInfo();
        $version = trim(shell_exec('git describe --always --tags --dirty'));
        $this->assertEquals($git->version(), $version);
    }

    /**
     * Assert the submodule status returns correctly.
     */
    public function testVersion()
    {
        $git = new GitInfo();
        $submodule_status = trim(shell_exec('git submodule status'));
        $this->assertEquals($git->submoduleStatus(), $submodule_status);
    }
}
