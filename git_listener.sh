#!/bin/bash
cd /home/nganct/Sites/test_cmd/docker-build;
REPO_URL="https://github.com/caongan2/docker-build.git"  # Thay thế bằng URL kho từ xa của bạn
BRANCH="main"  # Thay thế bằng nhánh mục tiêu của bạn

while true; do
    git fetch origin $BRANCH
    LOCAL=$(git rev-parse HEAD)
    REMOTE=$(git rev-parse origin/$BRANCH)

    if [ $LOCAL != $REMOTE ]; then
        echo "Kho từ xa đã có thay đổi. Thực hiện các hành động..."
        git pull origin $BRANCH
    else
        echo "Không có thay đổi trong kho từ xa."
    fi
done
