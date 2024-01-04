#!/bin/bash
cd /home/nganct/Sites/test_cmd/docker-build;
REPO_URL="https://github.com/caongan2/docker-build.git" 
BRANCH="main"
while true; do
    git fetch origin $BRANCH
    LOCAL=$(git rev-parse HEAD)
    REMOTE=$(git rev-parse origin/$BRANCH)

    if [ $LOCAL != $REMOTE ]; then
        echo "remote repo has changed"
        git pull origin $BRANCH
    else
        echo "no change"
    fi
done
