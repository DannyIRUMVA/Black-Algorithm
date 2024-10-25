<php

class Solution {
  /**
   * Remove subfolders from the given list of folder paths.
   *
   * @param array $folders List of folder paths as strings.
   * @return array List of folder paths without subfolders.
   */
  public function removeSubfolders(array $folders): array {
    sort($folders);

    $result = [$folders[0]];

    for ($i = 1; $i < count($folders); $i++) {
      $folder = $folders[$i];
      $lastAddedFolder = $result[count($result) - 1];
      

      $lastAddedFolderLength = strlen($lastAddedFolder);
      $currentFolderLength = strlen($folder);

      if ($lastAddedFolderLength >= $currentFolderLength ||
          !(substr($folder, 0, $lastAddedFolderLength) === $lastAddedFolder &&
            $folder[$lastAddedFolderLength] === '/')) {

        $result[] = $folder;
      }
    }

    return $result;
  }
}
?>
